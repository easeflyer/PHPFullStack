<?php

class CategoryAction extends CommonAction {

    function managecat() {
        $this->display();
    }

    function addcat() {
        if ($_POST) {
            $catemodel = new CategoryModel();
            if (!$catemodel->create()) {
                $message = $catemodel->getError();
                $this->error($message);
            } else {
                $catemodel->add();
                $this->success('添加成功', U('Category/managecat'));
            }
        } else {
            $catid = $_GET['catid'];
            if ($catid == 0) {
                $catid = "作为顶级分类";
            }
            $this->assign('catid', $catid);
            $this->display();
        }
    }

    function editcat() {
        $catemodel = new CategoryModel();
        if ($_POST) {
            if (!$catemodel->create()) {
                $message = $catemodel->getError();
                $this->error($message);
            } else {
                $catemodel->save();
                $this->success('修改成功', U('Category/managecat'));
            }
        } else {
            $catid = (int) $_GET['catid'];
            $data = $catemodel->getself($catid);
            if ($data[pid] == 0) {
                $data[pid] = '作为顶级分类';
            }
            $this->assign('data', $data);
            $this->display();
        }
    }

    /*
     * 删除分类
     * 1 当分类含有子类的时候，该分类不允许被删除
     * 2 如果分类当中含有商品，该分类不允许被删除
     */

    function delcat() {
        $catid = (int) $_GET['catid'];
        if($catid==0) return false;
        $catemodel=new CategoryModel();
        if($catemodel->haschild($catid)){
            $this->error("该栏目当中包含子类");
            return false;
        }
        if($catemodel->delete($catid)){
            $this->success('删除成功', U('Category/managecat'));
        }else{
            $this->error('删除失败', U('Category/managecat'));
        }
    }

    function treegridjson() {
        $catemodel = new CategoryModel();
        $catemodel->gettreedataforui(0, &$data);
        echo json_encode($data);
    }

    function combotreejson() {
        $catemodel = new CategoryModel();
        $catemodel->getjsonforcombotree(0, &$data);
        echo json_encode($data);
    }

}

?>