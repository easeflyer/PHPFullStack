<?php

class AddressAction extends CommonAction {

    function manage() {
        $id = (int) $_GET[id];
        //echo $id;
        $usermodel = M('Users');
        $userdata = $usermodel->field('id,username')->find($id);
        $this->assign('userdata', $userdata);
        $addressmodel = new AddressModel();
        $data = $addressmodel->where("users_id=$id")->select();
        $this->assign('data', $data);
        $this->assign('id', $id);
        $this->display();
    }

    function add() {
        if ($_POST) {
            $addressmodel = new AddressModel();
            if (!$addressmodel->create()) {
                $message = $addressmodel->getError();
                $this->error($message);
                return;
            }
            if ($addressmodel->add()) {
                $this->success('添加成功');
            } else {
                //echo $addressmodel->getlastsql();
                $this->error('添加失败');
            }
        } else {
            $userid = (int) $_GET[userid];
            $this->assign('userid', $userid);
            $this->display();
        }
    }

    function editjson() {
        $addressmodel = M('Address');
        $name = $_GET['fieldname'];
        $data[$name] = $_GET['val'];
        $addid = $_GET[id];
        if ($addressmodel->where("id=$addid")->save($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function del() {
        $id = (int) $_GET[id];
        $addressmodel = M('Address');
        if ($addressmodel->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

}

?>