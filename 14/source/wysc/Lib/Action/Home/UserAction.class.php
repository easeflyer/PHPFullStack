<?php

class UserAction extends Action {

    /**
     * 用户注册
     * 网站右上角点击注册调用本方法
     * @return type
     */
    function register() {
        R('Home/Common/header');
        //处理注册
        if ($_POST) {
            $usermodel = new UsersModel();
            if ($_POST['mycode'] == '') {
                R("Home/Common/error", array("验证码不能为空"));
                return;
            }
            // 验证短信验证码 register.html 调用 getcode 方法 发送给了用户手机，并且保存到$_SESSION['code']
            
            //if ($_POST['mycode'] != $_SESSION['code']) {
            //    R("Home/Common/error", array("验证码不正确,请重新获取"));
            //    return;
            //}
            
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
            $usermodel->pwd = md5($usermodel->pwd . $salt);
            if ($usermodel->add()) {
                R("Home/Common/error", array('注册成功'));
            } else {
                echo $usermodel->getlastsql();
                R("Home/Common/error", array('注册失败'));
            }
        //显示注册表单
        } else {
            $this->display();
        }
    }

    /**
     *  用户登录。
     *  注意登录成功的 代码处理。 
     *      1 刷新购物车。
     *      2 进入首页。
     *      $_SESSION[user] = 用户数据对象
     * @return type
     */
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
            //echo md5("demo1474852908");
            $salt = $data[salt];
            //echo $pwd . $salt; //demodemo1474852908
            
            $pwd = md5($pwd . $salt);
            //echo $pwd;
            if ($pwd == $data[pwd]) {   // 登录成功
                $_SESSION[user] = $data;
                // 登陆成功 刷新购物车 把未登录时 session 中添加的产品加入购物车表
                R("Home/Shopcar/refreshshopcar");
                R("Home/Common/error", array("登录成功", 'index.php'));
            } else {
                R("Home/Common/error", array("登录失败"));
                return;
            }
        } else {
            //echo md5("demodemo1474852908");
            $this->display('register'); // 注意这里调用的模板是 指定的 register 而不是默认的。
        }
    }

    function logout() {
        unset($_SESSION[user]);
        session_destroy();
        R("Home/Common/error", array("用户已经退出，请重新登录", U('User/login')));
        return;
    }
    /**
     * 验证登陆
     * $_SESSION[user] 登录时获得 用户数据对象
     * @return boolean 返回布尔值
     */
    function checkboxlogin() {
        if (!$_SESSION[user]) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * 用户中心 入口方法
     * 通过参数:$_GET[option]; 来执行用户中心的各种功能方法 $this->$option();
     * @return boolean
     */
    function ucenter() {
        R('Home/Common/header');
        // 判断登陆
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
    /**
     * 显示 和 修改个人信息
     * selfinfo.html 做必要的数据验证
     * @return type
     */
    private function selfinfo() {

        $usermodel = new UsersModel();
        if ($_POST) {
            unset($_POST[usermoney]); //ease:禁止用户修改余额
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
    /**
     * 显示用户收货地址表单 有几个地址 循环显示 并采用 ajax 方式修改
     * 见selfaddress.html
     */
    private function selfaddress() {

        if ($_POST) {
            // 这里没有处理 post 因为表单采用 ajax 方式修改数据
        } else {

            $userid = $_SESSION[user][id];
            $addressmodel = new AddressModel();
            $data = $addressmodel->where("users_id=$userid")->select();
            $this->assign('data', $data);
            $this->display('selfaddress');
        }
    }
    /**
     * 用户中心 显示收藏夹
     */
    private function selffavor() {
        $userid = $_SESSION[user][id];
        $favormodel = M('Favor');
        $goodsmodel = new GoodsViewModel();
        $favorid = $favormodel->where("users_id='$userid'")->select();
        $ret = array();
        foreach ($favorid as $value) {
            $goodid = $value['goods_id'];
            $item = $goodsmodel->find($goodid);
            $item[favorid] = $value[id];
            $ret[] = $item;
        }
        $this->assign('favorgoods', $ret);
        $this->display('selffavor');
    }
    /**
     * 用户中心 显示 用户评论
     */
    private function selfcomment() {
        import("ORG.Util.Page");
        $userid = $_SESSION[user][id];
        $commentmodel = new CommentViewModel();
        $where = "users_id=$userid";
        $commentcount = $commentmodel->where($where)->count();
        $commentpage = new Page($commentcount, 5);

        $commentdata = $commentmodel->where($where)->order('id desc')->limit($commentpage->firstRow, $commentpage->listRows)->select();
        $pageshow = $commentpage->show();
        $this->assign('commentdata', $commentdata);
        $this->assign('pageshow', $pageshow);
        $this->display('selfcomment');
    }

    private function selfshopcar() {
        echo 'selfshopcar';
    }
    /**
     * 显示 用户自己的订单
     */
    private function selforder() {
        import("ORG.Util.Page");
        $ordermodel = new OrderViewModel(); // 订单表 连接 订单状态,物流方式,用户信息
        $userid = $_SESSION[user][id];
        $where = "users_id='$userid'";
        $ordercount = $ordermodel->where($where)->count();
        trace($ordercount,'订单数量');
        $orderpage = new Page($ordercount, 10);
        $orderdata = $ordermodel->where("users_id='$userid'")->order('id desc')->limit($orderpage->firstRow, $orderpage->listRows)->select();
        $pageshow = $orderpage->show();
        $this->assign('orderdata', $orderdata);
        $this->assign('pageshow', $pageshow);
        $this->display("selforder");
    }
    /**
     * 用户中心 修改密码
     * @return type
     */
    private function modifypwd() {
        $usermodel = new UsersModel();
        if ($_POST) {
            $userid = $_POST[id];
            $userdata = $usermodel->find($userid);
            $oldpwd = $userdata[pwd];
            $salt = $userdata[salt];
            $oldinputpwd = $_POST[oldpwd];
            //判断原密码
            if (md5($oldinputpwd . $salt) != $oldpwd) {
                R("Home/Common/error", array("输入原密码不正确"));
                return;
            }
            //创建数据对象
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            //保存新密码。
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
    /**
     * 添加收货地址
     * 用户中心 收货地址 调用本方法
     * @return type
     */
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
    /**
     * 删除收货地址
     * 用户中心 收货地址 调用本方法
     */
    private function deladdress() {
        $id = (int) $_GET[id];
        $addressmodel = M('Address');
        if ($addressmodel->delete($id)) {
            R("Home/Common/error", array('删除成功', U('User/ucenter', array('option' => 'selfaddress'))));
        } else {
            R("Home/Common/error", array('删除失败'));
        }
    }
    /**
     * 用户中心 收货地址 表单元素的 onblur 触发 ajax请求本方法
     * 参数:
     *  列名,新值,地址表id
     * 返回值在 selfaddress.html 中并未使用。
     */
    private function editaddressjson() {
        $addressmodel = M('Address');
        $name = $_GET['fieldname']; //列名
        $data[$name] = $_GET['val'];// 修改后的值
        $addid = $_GET[id];//地址表id
        if ($addressmodel->where("id=$addid")->save($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    /**
     * 添加收藏
     * 列表页 商品下方 点击:添加收藏调用本方法
     * 参数:
     *  产品id  $_GET[goodsid];
     * @return boolean
     */
    function addfavor() {
        R('Home/Common/header');
        //判断登陆
        if (!$this->checkboxlogin()) {
            R("Home/Common/error", array("只有登录用户才能执行该操作", U('User/login')));
            return false;
        }
        $goodsid = (int) $_GET[goodsid];
        $userid = $_SESSION[user][id];
        $favormodel = M('Favor'); // 收藏表
        $data = array();
        $data[users_id] = $userid;
        $data[goods_id] = $goodsid;
        $count = $favormodel->where("users_id='$userid' and goods_id='$goodsid'")->count();
        //如果已经收藏 不重复收藏
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
    /**
     * 删除收藏
     * 用户中心 - 用户收藏 点击 删除收藏调用本方法
     */
    private function delfavor() {
        $favorid = (int) $_GET[favorid];
        $favormodel = M('Favor');
        if ($favormodel->delete($favorid)) {
            R("Home/Common/error", array("删除成功", U('User/ucenter', array('option' => 'selffavor'))));
        } else {
            R("Home/Common/error", array("删除失败"));
        }
    }
    /**
     * 删除评论
     * 用户中心 我的评论调用
     */
    private function delcomment() {
        $commentid = (int) $_GET[commentid];
        $model = M('Comment');
        if ($model->delete($commentid)) {
            R("Home/Common/error", array("删除成功", U('User/ucenter', array('option' => 'selfcomment'))));
        } else {
            R("Home/Common/error", array("删除失败"));
        }
    }
    /**
     * 添加评论
     * 由产品详情页提交评论
     * @return boolean
     */
    function addcomment() {
        R('Home/Common/header');
        if (!$this->checkboxlogin()) {
            R("Home/Common/error", array("只有登录用户才能执行该操作", U('User/login')));
            return false;
        }
        $userid = $_SESSION[user][id]; // 用户id
        $goodid = $_POST[goodid];      // 产品id
        $content = $_POST[content];    // 品论内容
        $data = array();
        $data[content] = $content;
        $data[users_id] = $userid;
        $data[goods_id] = $goodid;
        $commentmodel = M('Comment');
        if ($commentmodel->add($data)) {
            R("Home/Common/error", array("评论成功", U('Index/show', array('goodid' => $goodid))));
        } else {
            R("Home/Common/error", array("评论失败"));
        }
    }
    // 用户中心 - 查看订单详情
    private function orderdetail() {
        //订单的基本信息
        $orderid = $_GET[orderid];
        $ordermodel = new OrderViewModel();
        $basicorderdata = $ordermodel->find($orderid); 
        $this->assign('basicorderdata', $basicorderdata);
        //地址信息
        //echo "address_id:".$basicorderdata['address_id'];exit;
        $addressmodel = M('Address');
        $addressid = $basicorderdata['address_id'];
        //$addressid 如果是 null 则会调出第一个地址。所以这里要做判断  ease:if($addressid)
        if($addressid)$addressdata = $addressmodel->find($addressid);
        //print_r($addressdata);exit; 
        $this->assign('addressdata', $addressdata);
        //商品信息
        $ordergoodsmodel = M('Ordergoods'); // 订单商品表 订单中商品列表 由购物车生成
        $goodsdata = $ordergoodsmodel->where("orders_id='$orderid'")->select();
        $this->assign('goodsdata', $goodsdata);
        //print_r($basicorderdata);
        $this->display('orderdetail');
    }
    /**
     *  发送短信验证码  四位随机数 并存入 session
     * 前台 register.html 调用。
     * 如果发送成功返回 0，否则返回1
     */
    function getcode() {
        $code = rand(1000, 9999);
        $phone = $_GET[phone];
        $_SESSION['code'] = $code;
        $msg = "尊敬的3C商城客户您好，你的短信验证码为：$code,如果不是本人发送请忽略[3C商城]。";
        echo $this->sendmsg($phone, $msg);
    }

    private function sendmsg($phone, $msg) {
        $msg = urlencode($msg);
        $url = "http://web.cr6868.com/asmx/smsservice.aspx?name=18810767310&pwd=6ACA7F0FDFA4D478BE6FE03C0807&content=$msg&mobile=$phone&type=pt";
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