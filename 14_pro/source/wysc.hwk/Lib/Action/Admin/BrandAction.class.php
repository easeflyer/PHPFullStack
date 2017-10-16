<?php

class BrandAction extends CommonAction {

    function managebrand() {
        C('PAGE_SIZE', 5);
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = new BrandModel();
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    function addbrand() {
        if ($_POST) {
            $model = new BrandModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if (count($_FILES) > 0) {
                    $file = uploadfile();
                    if ($file[errno] == 1) {
                        $this->error("图片上传失败");
                        return;
                    }
                    $model->image = $file['info'][0]['savename'];
                }
                $model->add();
                $this->success('添加成功', U('Brand/managebrand'));
            }
        } else {
            $this->display();
        }
    }

    function editbrand() {
        $model = new BrandModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($_FILES[image][error] == 0) {
                    $file = uploadfile();
                    if ($file[errno] == 1) {
                        $this->error("图片上传失败");
                        return;
                    }
                    $model->image = $file['info'][0]['savename'];
                }
                if ($model->save()) {
                    $this->success('修改成功', U('Brand/managebrand'));
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $brandid = (int) $_GET['brandid'];
            $data = $model->find($brandid);
            $this->assign('data', $data);
            $this->display();
        }
    }
    function delbrand() {
        $brandid = (int) $_GET['brandid'];
        $model = new BrandModel();
        if($model->delete($brandid)){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    function getcombojson(){
        $model=new BrandModel();
        $data=$model->field('id,brandname')->select();
        $ret=array();
        foreach ($data as $val){
            $val1[id]=$val[id];
            $val1[text]=$val[brandname];
            $ret[]=$val1;
        }
        echo json_encode($ret);
    }

}

?>