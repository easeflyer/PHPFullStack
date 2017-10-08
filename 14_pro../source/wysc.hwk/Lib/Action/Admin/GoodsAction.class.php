<?php

class GoodsAction extends CommonAction {

    function manage() {
        C('PAGE_SIZE', 15);
        $page = (int) $_GET[page];
        $goodsname = $_GET[goodsname];
        $this->assign('goodsname', $goodsname);
        $cateid = $_GET[cateid];
        $this->assign('cateid', $cateid);
        $brand = $_GET[brand];
        $this->assign('brand', $brand);
        $module = $_GET[module];
        $this->assign('module', $module);
        $where = '1=1';
        if ($goodname)
            $where.=" and goodsname like '%" . $goodname . "%'";
        if ($catid)
            $where.=" and category_id=" . $catid;
        if ($brand)
            $where.=" and brand_id=" . $brand;
        if ($module)
            $where.=" and goodsattr_id=" . $module;
        $page = max(1, $page);
        $viewmodel = new GoodsViewModel();
        $total = $viewmodel->where($where)->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $viewmodel->where($where)->page($page, C('PAGE_SIZE'))->order('listorder asc,id desc')->select();
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        //查询商标
        $brandmodel = M('Brand');
        $brands = $brandmodel->select();
        $this->assign('brands', $brands);
        //查询模型
        $goodsattr = M('Goodsattr');
        $moudles = $goodsattr->select();
        $this->assign('modules', $moudles);
        $this->display();
    }

    function add() {
        if ($_POST) {
            if ($_POST[goodtype_id] == 0) {
                $_POST[goodtype_id] = null;
            }
            $model = new GoodsModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                //print_r($_FILES);
                if (!$model->add()) {
                    //echo $this->getLastSql();
                    $this->error('添加失败');
                    return false;
                }
                $goods_id = $model->getLastInsID();
                $attrlist = $_POST[attrlist];
                $attrval = M('Attrval');
                foreach ($attrlist as $key => $value) {
                    $attrdata = array();
                    //在多选情况下$value是一个数组需要转换成一个字符串
                    if (is_array($value)) {
                        $value = json_encode($value);
                    }
                    $attrdata[val] = $value;
                    $attrdata[goods_id] = $goods_id;
                    $attrdata[attrlist_id] = $key;
                    //print_r($attrdata);
                    //getLastSql找sql语句排错
                    $attrval->add($attrdata);
                }
                $mysavedata[thumb] = $this->addthumb($goods_id);
                $model->where("id=$goods_id")->save($mysavedata);
                $this->success('添加成功');
            }
        } else {
            $goodsattr = new Model('Goodsattr');
            $goodsmodellist = $goodsattr->select();
            $this->assign('goodsmodellist', $goodsmodellist);
            //查询类型
            $typemodel = M('Goodtype');
            $typedata = $typemodel->select();
            $this->assign('typedata', $typedata);
            $this->display();
        }
    }

    function del() {
        $model = M('Goods');
        $id = (int) $_GET[id];
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            //echo $model->getLastSql();
            $this->error('删除失败');
        }
    }

    function edit() {
        $model = new GoodsModel();
        if ($_POST) {
            $goods_id = $_POST[id];
            //$this->addthumb($goods_id);
            $attrlist = $_POST[attrlist];
            $attrmodel = M('Attrval');
            foreach ($attrlist as $key => $value) {
                $data = array();
                if (is_array($value))
                    $value = json_encode($value);
                $data[val] = $value;
                $attrmodel->where("id='$key'")->save($data);
            }
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                $model->thumb = $this->addthumb($goods_id);
                if ($model->save()) {
                    //echo $model->getLastSql();
                    $this->success('编辑成功');
                } else {
                    //echo $model->getLastSql();
                    $this->error('编辑失败或基本信息无修改');
                }
            }
        } else {
            $id = (int) $_GET[id];
            $goodsattr = new Model('Goodsattr');
            $goodsmodellist = $goodsattr->select();
            $this->assign('goodsmodellist', $goodsmodellist);
            $goodsdata = $model->find($id);
            $this->assign('goodsdata', $goodsdata);
            //print_r($goodsdata);
            $attrval = new AttrlistViewModel();
            $attrvaldata = $attrval->where("goods_id='$id'")->select();
            //echo $attrval->getLastSql();
            //print_r($attrvaldata);
            $attrlistaction = A('Admin/Attrlist');
            $itemlist = array();
            foreach ($attrvaldata as $val) {
                $item[val] = $attrlistaction->createinput($val[attrlist_id], 'attrlist[' . $val[id] . ']', $val[val]);
                $item[name] = $val[name];
                $itemlist[] = $item;
            }
            $this->assign('itemlist', $itemlist);
            //查询相册图片
            $picmodel = M('Goodspic');
            $pics = $picmodel->where("goods_id='$id'")->select();
            $this->assign('pics', $pics);
            $typemodel = M('Goodtype');
            //查询类型
            $typemodel = M('Goodtype');
            $typedata = $typemodel->select();
            $this->assign('typedata', $typedata);
            $this->display();
        }
    }

    function delthumb() {
        $picid = (int) $_GET[picid];
        $picmodel = M('Goodspic');
        if ($picmodel->delete($picid)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function addthumb($goods_id) {
        //$model = new GoodsModel();
        if (count($_FILES) > 0) {
            $file = uploadfile();
            $pics = array();
            foreach ($file[info] as $item) {
                //如果是缩略图
                if ($item[key] == 'thumb') {
                    $thumb = $item[savename];
                } else {
                    $pics[] = $item[savename];
                }
            }
            $picmodel = M('Goodspic');
            foreach ($pics as $value) {
                $data = array();
                thumb($value, 800, 800);
                thumb($value, 350, 350);
                thumb($value, 64, 64);
                $data[goods_id] = $goods_id;
                $data[picurl] = $value;
                //echo $picmodel->getLastSql();
                $picmodel->add($data);
            }
            return $thumb;
        }
    }

    function move() {
        $tocategory = $_GET[to];
        $ids = $_GET[ids];
        $catmodel = new CategoryModel();
        if ($catmodel->haschild($tocategory)) {
            $this->error('该分类包含子类，不能存放商品');
            return false;
        }
        $goodmodel = M('goods');
        $savedata[category_id] = $tocategory;
        if ($goodmodel->where("id in($ids)")->save($savedata)) {
            $this->success("移动成功");
        } else {
            $this->error("移动失败");
        }
    }

    function dels() {
        $ids = $_GET[ids];
        $goodmodel = M('goods');
        if ($goodmodel->where("id in($ids)")->delete()) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

    function listorder() {
        $id = (int) $_GET[id];
        $listorder = (int) $_GET[listorder];
        $goodsmodel = M('Goods');
        $savedata[listorder] = $listorder;
        if ($goodsmodel->where("id=$id")->save($savedata)) {
            echo 1;
        } else {
            //echo $goodsmodel->getlastsql();
            echo 0;
        }
    }

}

?>