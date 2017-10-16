<?php

class PublicAction extends Action {

    function login() {
        if ($_POST) {
            //登录处理
            $username = $_POST[username];
            //echo $username;
            $pwd = $_POST[pwd];
            $code = $_POST[code];
            if (md5($code) != $_SESSION[verify]) {
                $this->error('验证码错误');
                return;
            }
            import("ORG.Util.RBAC");
            $where = "username='$username'";
            $userinfo = RBAC::authenticate($where, 'Adminuser');
            if (!$userinfo) {
                $this->error('帐号不存在');
                return;
            }
            if (md5($pwd) !== $userinfo[pwd]) {
                //echo $pwd;
                //echo $userinfo[pwd];
                $this->error('用户名或密码错误');
                return;
            }
            $_SESSION[C('USER_AUTH_KEY')] = $userinfo[id];
            $_SESSION[username] = $userinfo[username];
            $data = array();
            $data[lastlogin] = time();
            //admin是超高管理员，默认拥有所有权限
            if ($userinfo[username] == 'admin') {
                $_SESSION[C('ADMIN_AUTH_KEY')] = true;
            } else {
                $_SESSION[C('ADMIN_AUTH_KEY')] = false;
            }
            M('Adminuser')->where("id=$userinfo[id]")->save($data);
            RBAC::saveAccessList();
            $this->success('登录成功', U('Admin/index'));
        } else {
            if ($_SESSION[C('USER_AUTH_KEY')]) {
                $this->redirect('Admin/index');
                return;
            }
            $this->display();
        }
    }

    Public function verify() {
        import("ORG.Util.Image");
        Image::buildImageVerify();
    }

    public function logout() {
        session_destroy();
        $this->success('您已经退出登录', U('Public/login'));
    }

    public function welcome() {
        $this->display();
    }

}

?>