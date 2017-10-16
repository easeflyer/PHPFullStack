<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 * function 使用函数验证，说明前面的那个验证是个函数名；
 * callback 使用方法验证，说明验证规则是一个Model类的方法；
 */
class UsersModel extends Model{
    protected $_validate = array(
        array('verify','require','验证码必须！'),
        array('uName','','账号已经存在',0,'unique',1),
        array('value',array(1,2,3),'值的范围不正确',2,'in'),
        array('rePwd','uPwd',' 确认密码不正确！',0,'confirm'),
        // function 使用函数验证，说明前面的那个验证是个函数名；
        // callback 使用方法验证，说明验证规则是一个Model类的方法；
        array('uPwd','checkPwd','密码格式不正确！',0,'callback'),
        //array('uPwd','checkPwd','密码格式不正确！',0,'function'),
    );
    
    function checkPwd($uPwd){
        if(strlen($uPwd)<6) return false;
        return true;
    }
}
