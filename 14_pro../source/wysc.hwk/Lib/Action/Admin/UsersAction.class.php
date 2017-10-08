<?php

class UsersAction extends CommonAction {

    function manage() {
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = new UserViewModel();
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    function add() {
        if ($_POST) {
            $usermodel = new UsersModel();
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                $this->error($message);
                return;
            }
            $salt = time();
            $usermodel->regtime = time();
            $usermodel->salt = $salt;
            $usermodel->pwd = md5($usermodel->pwd . $salt); //加密
            if ($usermodel->add()) {
                $this->success('添加成功');
            } else {
                //echo $usermodel->getlastsql();
                //数据库错误，外键约束问题
                $this->error('添加失败');
            }
        } else {
            $rankmodel = M('Userrank');
            $defaultrank = $rankmodel->find();
            $this->assign('defaultrank', $defaultrank);
            $this->display();
        }
    }

    function edit() {
        $usermodel = new UsersModel();
        if ($_POST) {
            $id = $_POST[id];
            $data = $usermodel->find($id);
            $pwd = $data[pwd];
            $salt = $data[salt];
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                $this->error($message);
                return;
            }
            if ($usermodel->pwd == '') {
                $usermodel->pwd = $pwd;
            } else {
                $usermodel->pwd = md5($usermodel->pwd . $salt);
            }
            if ($usermodel->save()) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        } else {
            $id = (int) $_GET[id];
            $data = $usermodel->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $id = (int) $_GET[id];
        $usermodel = new UsersModel();
        if ($usermodel->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    function moneydetail() {
        $id = (int) $_GET[id];
        $moneydetailmodel = M('Moneydetail');
        $data = $moneydetailmodel->where("users_id=$id")->select();
        $this->assign('data', $data);
        $this->assign('userid', $id);
        $this->display();
    }

    /*function addmoney() {
        if ($_POST) {
            $model = M('Moneydetail');
            $user = M('Users');
            $user->find($_POST[users_id]);
            if ($model->add($_POST)) {
                $user->usermoney = $_POST[newmoney];
                $user->save();
                $this->success('添加成功');
            } else {
                $this->error('添加成功');
            }
        } else {
            $userid = $_GET[userid];
            $this->assign('userid', $userid);
            $this->display();
        }
    }*/

}

?>