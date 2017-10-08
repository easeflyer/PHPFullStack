<?php

class GoodsattrAction extends CommonAction {

    public function managegoodsattr() {
        C('PAGE_SIZE', 15);
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = new GoodsattrModel();
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    public function addgoodsattr() {
        if ($_POST) {
            $model = new GoodsattrModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->add()) {
                    $this->success('添加成功', U('Goodsattr/managegoodsattr'));
                } else {
                    $this->success('添加失败');
                }
            }
        } else {
            $this->display();
        }
    }

    function editattr() {
        $model = new GoodsattrModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->save()) {
                    $this->success('修改成功', U('Goodsattr/managegoodsattr'));
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $attrid = (int) $_GET['id'];
            $data = $model->find($attrid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $attrid = (int) $_GET['id'];
        $model = new GoodsattrModel();
        if ($model->delete($attrid)) {
            $this->success('删除成功', U('Goodsattr/managegoodsattr'));
        } else {
            $this->error('删除失败');
        }
    }
    function getcombojson(){
        $model=new GoodsattrModel();
        $data=$model->field('id,attrname')->select();
        $ret=array();
        foreach ($data as $val){
            $val1[id]=$val[id];
            $val1[text]=$val[attrname];
            $ret[]=$val1;
        }
        echo json_encode($ret);
    }

}

?>