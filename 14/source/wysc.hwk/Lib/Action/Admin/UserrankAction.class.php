<?php

class UserrankAction extends CommonAction {

    function manage() {
        $rankmodel = M('Userrank');
        $rankdata = $rankmodel->select();
        $this->assign('data', $rankdata);
        $this->display();
    }

    function add() {
        if ($_POST) {
            $rankmodel = new UserrankModel();
            if (!$rankmodel->create()) {
                $message = $rankmodel->getError();
                $this->error($message);
                return;
            }
            if ($rankmodel->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    function edit() {
        $rankmodel = new UserrankModel();
        if ($_POST) {
            if (!$rankmodel->create()) {
                $message = $rankmodel->getError();
                $this->error($message);
                return;
            }
            if ($rankmodel->save()) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        } else {
            $id = (int) $_GET[id];
            $data = $rankmodel->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $id = (int) $_GET[id];
        $model = M('Userrank');
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }

    function rankjson() {
        $model = M('Userrank');
        $data = $model->field('id,rankname')->select();
        echo json_encode($data);
    }

}

?>