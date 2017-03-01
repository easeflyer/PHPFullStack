<?php

class CommonAction extends Action {

    function _initialize() {
        //没有登录
        if (!$_SESSION[C('USER_AUTH_KEY')]) {
            $this->error('尚未登录', U('Public/login'));
        }
        //C('USER_AUTH_ON') 是否开启了验证（权限验证可以在配置文件中关闭）
        //in_array('MODULE_NAME',explode(',',C('NOT_AUTH_MODULE')）) 并在模块在验证之列
        //explode(',',C('NOT_AUTH_MODULE') 把 逗号分隔的字符串转换成数组
        //MODULE_NAME 是当前模块的名称 也就是 类文件的名称
        if (C('USER_AUTH_ON') && !in_array('MODULE_NAME', explode(',', C('NOT_AUTH_MODULE')))) {
            import('ORG.Util.RBAC');
            // RBAC::AccessDecision('adminmenu')
            // 验证 adminmenu根节点的 “当前模块” ；当前用户是否具备访问权限。
            // AccessDecision 内部取出当前模块
            if (!RBAC::AccessDecision('adminmenu')) {
                $this->error('该用户没有权限', U('Public/login'));
            }
        }
    }

}

?>