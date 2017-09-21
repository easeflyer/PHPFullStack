<?php

// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {

    public function header() {
        $nowtime = date("Y年m月d日");
        $_USER=$_SESSION[user];
        $this->assign('nowtime', $nowtime);
        $categorymodel = new CategoryModel();
        $navdata = $categorymodel->getchild(0, true);
        //print_r($navdata);
        $this->assign('_USER',$_USER);
        $this->assign("navdata", $navdata);
    }

    function getgoodsbycatid($catid, $num, $typeid = '') {
        $goodmodel = new GoodsModel();
        $incls = $this->getsubid($catid);
        $ret = $goodmodel->where("category_id in($incls) and thumb!=' '")->order('listorder asc, id desc')->limit($num)->select();
        //echo $goodmodel->getLastsql();
        return $ret;
    }

    function getsubid($catid) {
        $catemodel = new CategoryModel();
        $catemodel->getallchild($catid, $subcate);
        $incls = "'$catid'";
        foreach ($subcate as $value) {
            $incls.=",'$value[id]'";
        }
        return $incls;
    }

    function getbrandbycatid($catid = 0, $typeid = 0, $keyword = '') {
        $where = " 1=1 ";
        if ($catid) {
            $subids = $this->getsubid($catid);
            $where.= " and category_id in($subids) ";
        }
        if ($typeid) {
            $where.=" and goodtype_id = $typeid";
        }
        if ($keyword) {
            $where.=" and goodsname like '%$keyword%'";
        }
        $goodsmodel = M('Goods');
        $brandids = $goodsmodel->field('distinct brand_id as brandid ')->where($where)->select();
        //print_r($brandids);
        $incls = " ";
        foreach ($brandids as $value) {
            $incls.="'$value[brandid]',";
        }
        $incls = substr($incls, 0, -1);
        //print_r($incls);
        $brandmodel = M('Brand');
        $branddata = $brandmodel->where("id in ($incls)")->select();
        return $branddata;
    }

    //筛选的价格区间
    function getpricerange($catid = 0, $typeid = 0, $brandid = 0, $keyword = '') {
        $where = " 1=1 ";
        if ($catid) {
            $subids = $this->getsubid($catid);
            $where.=" and category_id in($subids) ";
        }
        if ($typeid) {
            $where.=" and goodtype_id = $typeid";
        }
        if ($brandid) {
            $where.=" and brand_id = $brandid";
        }
        if ($keyword) {
            $where.=" and goodsname like '%$keyword%' ";
        }
        $goodsmodel = M('Goods');
        $maxprice = $goodsmodel->where($where)->max('price');
        if (!$maxprice) return array();
        $minprice = $goodsmodel->where($where)->min('price');
        $range = 6;
        $priceperrange = ($maxprice - $minprice) / $range;
        /*
         * 价格区间的算法
         * 如果比50小，价格区间就是50
         * 比50大比100小 价格区间就是100
         * 比100大比500小 价格区间就是500
         * 比500大价格区间1000
         */
        if ($priceperrange <= 50) {
            $pricerange = 50;
        } elseif ($priceperrange <= 100) {
            $pricerange = 100;
        } elseif ($priceperrange <= 500) {
            $pricerange = 500;
        } else {
            $pricerange = 1000;
        }
        $firstprice = $pricerange;
        $i = 1;
        while ($firstprice < $minprice) {
            $i++;
            $firstprice*=$i;
        }
        $lastprice = $pricerange * $range;
        $i = 0;
        while ($lastprice >= $maxprice) {
            $lastprice-=$pricerange;
        }
        $retrand = array();
        $firstpriceval[gt] = $firstprice;
        $firstpriceval[text] = $firstpriceval[gt] . "以下";
        $retrand[] = $firstpriceval;
        $starprice = $firstprice;
        while ($starprice < $lastprice) {
            $curprice = array();
            $curprice[lt] = $starprice;
            $curprice[gt] = $starprice + $pricerange;
            $curprice[text] = $curprice[lt] . '--' . $curprice[gt];
            $retrand[] = $curprice;
            $starprice+=$pricerange;
        }
        if ($lastprice != 0) {
            $lastpriceval[lt] = $lastprice;
            $lastpriceval[text] = $lastpriceval[lt] . "以上";
            $retrand[] = $lastpriceval;
        }
        return $retrand;
    }

    function error($msg, $url = '') {
        $this->header();
        //echo $url;
        $this->assign('msg', $msg);
        $this->assign('url', $url);
        $this->display('Common:error');
    }

    function getthumb($goodid) {
        $picmodel = M('Goodspic');
        $data = $picmodel->where("goods_id = $goodid ")->select();
        $ret = array();
        foreach ($data as $value) {
            $item = array();
            $item[picname] = basename($value[picurl]);
            $item[picdir] = dirname($value[picurl]) . '/';
            $ret[] = $item;
        }
        return $ret;
    }

    function createinput($attrlistid, $name = '', $val = '') {
        $attrlistmodel = new AttrlistModel();
        $input = $attrlistmodel->find($attrlistid);
        if ($input[inputtype] == 1) {
            return '<span>' . $val . '</span><input type="hidden" name="' . $name . '" class="ipt" value="' . $val . '">';
        }
        if ($input[inputtype] == 2) {
            $optionlist = $input[optionlist];
            //在linux中文本的换行符为\r，而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $i = 0;
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if ($val == '') {
                    if ($i == 0) {
                        $ret.="<input type='radio' disabled name='$name' value='$option' checked=true>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    } else {
                        $ret.="<input type='radio' disabled name='$name' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    }
                } else {
                    if ($val == $option) {
                        $ret.="<input type='radio' disabled name='$name' value='$option' checked=true>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    } else {
                        $ret.="<input type='radio' disabled name='$name' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    }
                }
                $i++;
            }
            return $ret;
        }
        if ($input[inputtype] == 3) {
            $optionlist = $input[optionlist];
            //在linux中文本的换行符为\r，而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $val = json_decode($val);
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if (in_array($option, $val)) {
                    $ret.="<input type='checkbox' disabled name='" . $name . "[]' value='$option' checked>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                } else {
                    $ret.="<input type='checkbox' disabled name='" . $name . "[]' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                }
            }
            return $ret;
        }
    }

    function getbrand($limit = 10) {
        $brandmodel = new Model('Brand');
        $branddata = $brandmodel->order("id desc")->limit($limit)->select();
        return $branddata;
    }

    function addviewhistory($goodid) {
        $favor = json_decode($_COOKIE[myfavor]);
        if (!$favor) $favor = array();
        if (in_array($goodid, $favor)) {
            $key = array_search($goodid, $favor);
            unset($favor[$key]);
        };
        array_unshift($favor, $goodid);
        setcookie('myfavor', json_encode($favor), strtotime('+30 days'));
    }

    function getviewhistory($count) {
        $favor = json_decode($_COOKIE[myfavor]);
        $goodsmodel = M('Goods');
        $ret = array();
        $i = 0;
        foreach ($favor as $goodid) {
            if ($i >= $count) break;
            $item = $goodsmodel->find($goodid);
            $ret[] = $item;
            $i++;
        }
        return $ret;
    }

}
