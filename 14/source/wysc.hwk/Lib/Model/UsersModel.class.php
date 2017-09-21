<?php
class UsersModel extends Model{
    protected $_validate = array(
        array('username','require','用户名不能为空'),
        array('username','','用户名必须唯一',0,'unique'),
        array('pwd','require','密码不能为空'),
        array('pwd','/.{8,}/','密码至少8位',0,'regex',1),
        array('confirmpwd','pwd','密码与确认密码必须一致',1,'confirm'),
        array('email','email','邮箱格式不正确'),
        array('email','','该邮箱已被注册',0,'unique'),
        array('ponits','/\d+/','基本必须为数字'),
        array('phone','/.{11,}/','手机格式不正确'),
        array('phone','','该手机已被注册',0,'unique')
    );
}
?>