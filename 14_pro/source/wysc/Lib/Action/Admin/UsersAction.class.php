<?php

class UsersAction extends CommonAction {

    /**
     *  显示 用户列表 处理分页
     */
    function manage() {
        // 增加了 用户级别查询条件
        $where = "1=1";
        if($_GET['rank_id']){
            $rank_id = $_GET['rank_id'];
            $where .= " AND userrank_id = {$rank_id}";
        }
        // 增加用户级别查询条件
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = new UserViewModel();  // 应用了 thinkphp de viewmodel 的知识 参见手册：视图模型
        $total = $model->count();       // 总数据量
        $totalpage = ceil($total / C('PAGE_SIZE'));  // 总页数
        $page = min($totalpage, $page);
        //$data = $model->page($page, C('PAGE_SIZE'))->select();  // 获得分页数据
        $data = $model->where($where)->page($page, C('PAGE_SIZE'))->select();  // 获得分页数据  ease: 修改
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    // 添加用户 如果有提交就 处理 添加，如果没有则显示模板
    // 只涉及到了 UsersModel 模型，并没有其他关联模型。
    function add() {
        if ($_POST) {
            $usermodel = new UsersModel();
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                $this->error($message);
                return;
            }
            $salt = time();  // 加点盐，MD5 就更加难以破解了，但是加的这个字符串也要记录到数据库用于 登录时的比较。
            $usermodel->regtime = time();
            $usermodel->salt = $salt;
            $usermodel->pwd = md5($usermodel->pwd . $salt);  // 密码的编码 先加 salt 再编码。
            if ($usermodel->add()) {
                $this->success('添加成功');
            } else {
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

    function addmoney() {
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
    }

}

?>