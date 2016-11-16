<?php
/**
 * 案例1:uId4 用户修改
 */

include 'model/Model.class.php'; //数据库通用类
include 'model/UsersModel.class.php'; //数据库 users表操作的类
$model = new Model("localhost","root","","utf8","mvc");

/*
$users = new users();
$users->uName = "wangwu";
$users->uPwd = "3333";
$users->uAge = 20;

$usersModel = new UsersModel($model); //通用类的model 作为对象传递到usersModel中
$usersModel->addUsers($users);
*/
/*
$users = new users();
$users->uId = 1;
$usersModel = new UsersModel($model); //通用类的model 作为对象传递到usersModel中
$usersModel->delUsers($users);
*/
$users = new users();
$users->uId = 4;
$users->uName = "wangwu11111";
$users->uPwd = "344444";
$users->uAge = 22;

$usersModel = new UsersModel($model); //通用类的model 作为对象传递到usersModel中
$usersModel->save($users);









