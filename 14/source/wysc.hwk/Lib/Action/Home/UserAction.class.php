<?php

class UserAction extends Action {

    function register() {
        R('Home/Common/header');
        if ($_POST) {
            $usermodel = new UsersModel();
            //print_r($usermodel);
            if ($_POST[pwd] == '') {
                R("Home/Common/error", array("密码不能为空"));
                return;
            }
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            $salt = time();
            $usermodel->regtime = time();
            $usermodel->salt = $salt;
            $usermodel->pwd = md5($usermodel->pwd . $salt); //加密
            if ($usermodel->add()) {
                R("Home/Common/error", array('注册成功'));
            } else {
                //echo $usermodel->getlastsql();
                //数据库错误，外键约束问题
                R("Home/Common/error", array('注册失败'));
            }
        } else {
            $this->display();
        }
    }

    function login() {
        R('Home/Common/header');
        if ($_POST) {
            $usermodel = new UserViewModel();
            $username = $_POST[username];
            $pwd = $_POST[pwd];
            if ($username == '') {
                R("Home/Common/error", array("用户名不能为空"));
                return;
            }
            if (!preg_match('/^.{8,}$/', $pwd)) {
                R("Home/Common/error", array("密码不符合要求"));
                return;
            }
            $where = "username='$username'";
            $data = $usermodel->where($where)->find();
            if (is_null($data)) {
                R("Home/Common/error", array("登录失败"));
                return;
            }
            $salt = $data[salt];
            $pwd = md5($pwd . $salt);
            if ($pwd == $data[pwd]) {
                $_SESSION[user] = $data;
                //print_r($data);
                R("Home/Shopcar/refreshshopcar");
                R("Home/Common/error", array("登录成功", 'index.php/Home'));
            } else {
                R("Home/Common/error", array("登录失败"));
                return;
            }
        } else {
            $this->display('register');
        }
    }

    function logout() {
        unset($_SESSION[user]);
        session_destroy();
        R("Home/Common/error", array("用户已经退出，请重新登录", U('User/login')));
        return;
    }

    function checkboxlogin() {
        if (!$_SESSION[user]) {
            return false;
        } else {
            return true;
        }
    }

    function ucenter() {
        R('Home/Common/header');
        if (!$this->checkboxlogin()) {
            R("Home/Common/error", array("请先登录", U('User/login')));
            return false;
        }
        $option = $_GET[option];
        if ($option == '')
            $option = 'selfinfo';
        $options = array('selfinfo', 'selfaddress', 'selffavor', 'selfcomment', 'selfshopcar', 'selforder', 'modifypwd', 'addaddress', 'deladdress', 'editaddressjson', 'delfavor', 'delcomment', 'orderdetail');
        if (!in_array($option, $options)) {
            R("Home/Common/error", array("非法操作参数", U('User/Ucenter')));
            return false;
        }
        $this->$option();
    }

    //个人信息
    private function selfinfo() {
        //echo U('User/logout');
        $usermodel = new UsersModel();
        if ($_POST) {
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            if ($usermodel->save()) {
                R("Home/Common/error", array("修改成功"));
            } else {
                R("Home/Common/error", array("修改失败，或没有可修改信息"));
            }
        } else {
            $userid = $_SESSION[user][id];
            $userdata = $usermodel->find($userid);
            $this->assign('userdata', $userdata);
            $this->assign('userid', $userid);
            $this->display('selfinfo');
        }
    }

    //收货地址 
    private function selfaddress() {
        if ($_POST) {
            
        } else {
            $userid = $_SESSION[user][id];
            //echo $userid;
            $addressmodel = new AddressModel();
            $data = $addressmodel->where("users_id=$userid")->select();
            //echo $addressmodel->getlastsql();
            //print_r($data);
            $this->assign('data', $data);
            $this->display('selfaddress');
        }
    }

    //个人收藏
    private function selffavor() {
        $userid = $_SESSION[user][id];
        $favormodel = M('Favor');
        $goodsmodel = new GoodsViewModel();
        $favorid = $favormodel->where("users_id='$userid'")->select();
        //print_r($favorid);
        $ret = array();
        foreach ($favorid as $value) {
            $goodid = $value['goods_id'];
            $item = $goodsmodel->find($goodid);
            $item[favorid] = $value[id];
            $ret[] = $item;
        }
        //print_r($ret);
        $this->assign('favorgoods', $ret);
        $this->display('selffavor');
    }

    //评价
    private function selfcomment() {
        import("ORG.Util.Page");
        $userid = $_SESSION[user][id];
        $commentmodel = new CommentViewModel();
        $where = "users_id=$userid";
        $commentcount = $commentmodel->where($where)->count();
        $commentpage = new Page($commentcount, 3);
        $commentdata = $commentmodel->where($where)->order('id desc')->limit($commentpage->firstRow, $commentpage->listRows)->select();
        //echo 1111111111;
        //print_r($commentcount);
        $pageshow = $commentpage->show();
        $this->assign('commentdata', $commentdata);
        $this->assign('pageshow', $pageshow);
        $this->display('selfcomment');
    }

    //购物车
    private function selfshopcar() {
        echo 'selfshopcar';
    }

    //订单 
    private function selforder() {
        import("ORG.Util.Page");
        $ordermodel = new OrderViewModel();
        $userid = $_SESSION[user][id];
        $where = "users_id='$userid'";
        $ordercount = $ordermodel->where($where)->count();
        $orderpage = new Page($ordercount,5);
        $orderdata = $ordermodel->where($where)->order('id desc')->limit($orderpage->firstRow, $orderpage->listRows)->select();
        $pageshow = $orderpage->show();
        $this->assign('orderdata', $orderdata);
        //echo $ordermodel->getlastsql();
        //print_r($orderdata);
        $this->assign('pageshow', $pageshow);
        $this->display('selforder');
    }

    private function modifypwd() {
        $usermodel = new UsersModel();
        if ($_POST) {
            $userid = $_POST[id];
            $userdata = $usermodel->find($userid);
            $oldpwd = $userdata[pwd];
            $salt = $userdata[salt];
            $oldinputpwd = $_POST[oldpwd];
            if (md5($oldinputpwd . $salt) != $oldpwd) {
                R("Home/Common/error", array("输入原密码不正确"));
                return;
            }
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            $usermodel->pwd = md5($usermodel->pwd . $salt);
            if ($usermodel->save()) {
                R("Home/Common/error", array("密码修改成功", U('User/logout')));
            } else {
                R("Home/Common/error", array("密码修改失败"));
            }
        } else {
            $userid = $_SESSION[user][id];
            $userdata = $usermodel->find($userid);
            $this->assign('userdata', $userdata);
            $this->assign('userid', $userid);
            $this->display('modifypwd');
        }
    }

    private function addaddress() {
        if ($_POST) {
            $addressmodel = new AddressModel();
            if (!$addressmodel->create()) {
                $message = $addressmodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            if ($addressmodel->add()) {
                R("Home/Common/error", array('添加成功', U('User/ucenter', array('option' => 'selfaddress'))));
            } else {

                R("Home/Common/error", array('添加失败'));
            }
        } else {
            $userid = $_SESSION[user][id];
            $this->assign('userid', $userid);
            $this->display('addaddress');
        }
    }

    private function deladdress() {
        $id = (int) $_GET[id];
        $addressmodel = M('Address');
        if ($addressmodel->delete($id)) {
            R("Home/Common/error", array('删除成功', U('User/ucenter', array('option' => 'selfaddress'))));
        } else {
            R("Home/Common/error", array('删除失败'));
        }
    }

    private function editaddressjson() {
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

    function addfavor() {
        R('Home/Common/header');
        if (!$this->checkboxlogin()) {
            R("Home/Common/error", array("只有登录用户才能执行该操作", U('User/login')));
            return false;
        }
        $goodsid = (int) $_GET[goodsid];
        //echo $goodsid;
        $userid = $_SESSION[user][id];
        //echo $userid
        $favormodel = M('Favor');
        $data = array();
        $data[users_id] = $userid;
        $data[goods_id] = $goodsid;
        $count = $favormodel->where("users_id='$userid' and goods_id='$goodsid'")->count();
        if ($count > 0) {
            R("Home/Common/error", array("你已经收藏该商品，不能重复收藏"));
            return false;
        }
        if ($favormodel->add($data)) {
            R("Home/Common/error", array("收藏成功"));
        } else {
            R("Home/Common/error", array("操作失败"));
        }
    }

    private function delfavor() {
        $favorid = (int) $_GET[favorid];
        $favormodel = M('Favor');
        if ($favormodel->delete($favorid)) {
            R("Home/Common/error", array("删除成功", U('User/ucenter', array('option' => 'selffavor'))));
        } else {
            R("Home/Common/error", array("删除失败"));
        }
    }

    private function delcomment() {
        $commentid = (int) $_GET[commentid];
        $model = M('Comment');
        if ($model->delete($commentid)) {
            R("Home/Common/error", array("删除成功", U('User/ucenter', array('option' => 'selfcomment'))));
        } else {
            R("Home/Common/error", array("删除失败"));
        }
    }

    public function addcomment() {
        R('Home/Common/header');
        if (!$this->checkboxlogin()) {
            R("Home/Common/error", array("只有登录用户才能执行该操作", U('User/login')));
            return false;
        }
        $userid = $_SESSION[user][id];
        $goodid = $_POST[goodid];
        //echo $goodid;
        $content = $_POST[content];
        $data = array();
        $data[content] = $content;
        $data[users_id] = $userid;
        $data[goods_id] = $goodid;
        $commentmodel = M('Comment');
        if ($commentmodel->add($data)) {
            R("Home/Common/error", array("评论成功", U('Index/show', array('goodid' => $goodid))));
        } else {
            //echo $commentmodel->getlastsql();
            R("Home/Common/error", array("评论失败"));
        }
    }

    private function orderdetail() {
        //订单的基本信息
        $orderid = $_GET[orderid];
        $ordermodel = new OrderViewModel();
        $basicorderdata = $ordermodel->find($orderid);
        $this->assign('basicorderdata', $basicorderdata);
        //地址信息
        $addressmodel = M('Address');
        $addressid = $basicorderdata['address_id'];
        $addressdata = $addressmodel->find($addressid);
        $this->assign('addressdata', $addressdata);
        //商品信息
        $ordergoodsmodel = M('Ordergoods');
        $goodsdata = $ordergoodsmodel->where("orders_id='$orderid'")->select();
        $this->assign('goodsdata', $goodsdata);
        $this->display('orderdetail');
    }

    function getcode() {
        $code = rand(1000, 9999);
        $phone = $_GET[phone];
        $_SESSION['code'] = $code;
        $msg = "尊敬的3C商城客户您好，你的短信验证码为：$code,如果不是本人发送请忽略[3C商城]。";
        echo $this->sendmsg($phone, $msg);
    }

    private function sendmsg($phone, $msg) {
        $msg = urlencode($msg);
        $url = "http://web.cr6868.com/default.aspx?name=13315953316&pwd=6ACA7F0FDFA4D478BE6FE03C0807&content=$msg&mobile=$phone&type=py";
        $ret = file_get_contents($url);
        $return = substr($ret, 0, 1);
        if ($return == 0) {
            return 0;
        } else {
            return 1;
        }
    }

}

?>