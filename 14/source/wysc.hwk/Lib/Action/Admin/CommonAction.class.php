<?php

class CommonAction extends Action {

    function _initialize() {
        //admin是超高管理员，默认拥有所有权限
        //print_r($_SESSION);
        //没有登录
        if (!$_SESSION[C('USER_AUTH_KEY')]) {
            $this->error('尚未登录', U('Public/login'));
        }
        //如果开启了验证，并在模块在验证之列
        if (C('USER_AUTH_ON') && !in_array('MODULE_NAME', explode(',', C('NOT_AUTH_MODULE')))) {
            import('Org.Util.RBAC');
            //如果验证不通过
            if (!RBAC::AccessDecision('adminmenu')) {
                $this->error('该用户没有权限', U('Public/login'));
            }
        }
    }

}

?>
