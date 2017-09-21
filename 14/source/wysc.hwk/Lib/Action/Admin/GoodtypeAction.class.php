<?php

class GoodtypeAction extends CommonAction {

    public function manage() {
        $model = new GoodtypeModel();
        $data = $model->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function add() {
        if ($_POST) {
            $model = new GoodtypeModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->add()) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }
    }

    function edit() {
        $model = new GoodtypeModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->save()) {
                    $this->success('编辑成功', U('Goodtype/manage'));
                } else {
                    $this->error('编辑失败', U('Goodtype/manage'));
                }
            }
        } else {
            $typeid = (int) $_GET[id];
            $data = $model->find($typeid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $id = (int) $_GET[id];
        $model = new GoodtypeModel();
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

}

?>