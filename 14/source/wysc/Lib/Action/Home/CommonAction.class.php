<?php
/**
 *  公共 Action 提供一些公共功能。
 *  ease:所有方法已读
 */

class CommonAction extends Action {
    /**
     *  用于页面头部的 渲染，主要是处理几个 模板变量
     */
    public function header() {
        $nowtime = date("Y年m月d日");
        $_USER = $_SESSION[user];

        $this->assign('nowtime', $nowtime);
        $categorymodel = new CategoryModel();
        $navdata = $categorymodel->getchild(0, true);
        $this->assign('navdata', $navdata);
        $this->assign('_USER', $_USER);
    }
    /**
     * 获得特定商品对象数据集
     * @param type $catid 分类id
     * @param type $num   数据条数限制
     * @param type $typeid 商品类型:热卖,推荐,最新
     * @return type 商品对象数据集。
     */
    function getgoodsbycatid($catid, $num, $typeid = '') {
        $goodmodel = new GoodsModel();
        $incls = $this->getsubid($catid);
        $ret = $goodmodel->where("category_id in($incls) and thumb!=''")->order('listorder asc, id desc')->limit($num)->select();
        //echo $goodmodel->getlastsql();
        return $ret;
    }
    
    // 返回值：返回一个 字符串 1,2,3,4  包含 $catid 以及所有 子分类id
    function getsubid($catid) {
        $catemodel = new CategoryModel();
        $catemodel->getallchild($catid, $subcate); // $subcate 作为引用传入  递归获得 所有子类对象
        $incls = "'$catid'";
        foreach ($subcate as $value) {
            $incls.=",'$value[id]'";
        }
        return $incls;
    }
    /**
     * 根据特定参数 获取 品牌数据对象
     * 注意:这个方法显然是返回 数据对象 因此应该写到 model 里面。
     * @param type $catid
     * @param type $typeid
     * @param type $keyword
     * @return 品牌数据对象
     */
    function getbrandbycatid($catid = 0, $typeid = 0, $keyword = '') {
        $where = " 1=1 ";
        // 根据参数 构造 $where 条件
        if ($catid) {
            $subids = $this->getsubid($catid);
            $where.=" and category_id in($subids) ";
        }
        if ($typeid) {
            $where.=" and goodtype_id = $typeid";
        }
        if ($keyword) {
            $where.=" and goodsname like '%$keyword%'";
        }
        
        
        $goodsmodel = M('Goods');
        $brandids = $goodsmodel->field('distinct brand_id as brandid ')->where($where)->select();
        $incls = "";
        foreach ($brandids as $value) {
            $incls.="'$value[brandid]',";
        }
        $incls = substr($incls, 0, -1);
        $brandmodel = M('Brand');
        $branddata = $brandmodel->where("id in ($incls)")->select();
        return $branddata;
    }
    /**
     *  获得价格区间 数组,根据参数条件。
     * @param type $catid
     * @param type $typeid
     * @param type $brandid
     * @param type $keyword
     * @return string 价格区间数组。50,100,1000,5000以上 等。
     */
    function getpricerange($catid = 0, $typeid = 0, $brandid = 0, $keyword = '') {
        // 构造 $where 条件
        $where = " 1=1 ";
        if ($catid) {
            $subids = $this->getsubid($catid);  // 获得所有子分类 id
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
        $maxprice = $goodsmodel->where("$where")->max('price'); // 获得给定条件的最高价格
        //echo $goodsmodel->getLastSql();exit;
        if (!$maxprice)
            return array();
        $minprice = $goodsmodel->where("$where")->min('price');// 获得给定条件的低高价格
        $range = 6; //分6个区间
        $priceperrange = ($maxprice - $minprice) / $range; // 最高价与最低价差除以6 获得区间价格差
        /** 区间价格 $priceperrange
         * 对区间价格进行 整数化
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
        $lastprice = $pricerange * $range;  // 最高价格区间并不一定是 本分类商品的 最高价格。比如商品最高价可以是10万,但是最高价格区间就是:高于8000
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
    /**
     * 
     * @param type $msg 提示信息。
     * @param type $url 如果有则跳转到此url 如果没有就 返回上一页面。
     */
    function error($msg, $url = '') {
        $this->header();
        $this->assign('msg', $msg); // 错误提示
        $this->assign('url', $url); // 需要跳转到的 url
        $this->display('Common:error'); // 渲染错误提示 模板页
    }
    // Goodspic 产品图片表：产品id , 图片 url
    // 返回 此产品 所有图片的 一个数组
    function getthumb($goodid) {
        $picmodel = M('Goodspic');
        $data = $picmodel->where("goods_id = $goodid ")->select();
        $ret = array();
        foreach ($data as $value) {
            $item = array();
            $item[picname] = basename($value[picurl]);  //basename 返回文件名
            $item[picdir] = dirname($value[picurl]) . '/'; // dirname 返回路径部分
            $ret[] = $item;
        }
        return $ret;
    }

    
    // 用于构造 具体 attrlist  属性 的html 显示结果
    // 详情页 输出 具体产品的 属性时，会调用这个方法 用于 html 编码输出属性结果。
    function createinput($attrlistid, $name = '', $val = '') {
        $attrlistmodel = new AttrlistModel();
        $input = $attrlistmodel->find($attrlistid);
        // 1 输入框
        if ($input[inputtype] == 1) {
            return '<span>' . $val . '</span><input type="hidden" name="' . $name . '" class="ipt" value="' . $val . '">';
        }
        // 2 单选框
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
        // 3 多选框
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
    // 获得10个品牌数据对象
    function getbrand($limit = 10) {
        $brandmodel = new Model('Brand');
        $branddata = $brandmodel->order("id desc")->limit($limit)->select();

        return $branddata;
    }
    // 添加产品浏览历史。只有查看详情页后才会 记录李兰历史 见 indexAction show 方法
    function addviewhistory($goodid) {
        $favor = json_decode($_COOKIE[myfavor]); // 首先读取浏览历史为数组
        if (!$favor)
            $favor = array();
        if (in_array($goodid, $favor)) {
            $key = array_search($goodid, $favor); // 返回 $goodid 对应的 key
            unset($favor[$key]); // 销毁对应的数组元素
        }
        array_unshift($favor, $goodid); // 重新插入元素 起到了浏览历史的更新作用。删掉以前的历史,重新记录当前产品
        setcookie('myfavor', json_encode($favor), strtotime('+30 days'));
    }
    // 获得用户浏览过的商品数据集
    function getviewhistory($count) {
        $favor = json_decode($_COOKIE[myfavor]); // 返回数组
        $goodsmodel = M('Goods');
        $ret = array();
        $i = 0;
        foreach ($favor as $goodid) {
            if ($i >= $count)
                break;
            $item = $goodsmodel->find($goodid);
            $ret[] = $item;
            $i++;
        }
        return $ret;
    }

}

?>