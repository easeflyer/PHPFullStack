<?php
include 'model/Model.class.php'; //数据库通用类
include 'model/UsersModel.class.php'; //数据库 users表操作的类
include "view/UsersView.class.php";
$model = new Model("localhost","root","root","utf8","mvc");

/*
$uObj = new users();
$uObj->uId =2;

$usersModel = new UsersModel($model); //通用类的model 作为对象传递到usersModel中
$rs = $usersModel->getUsersById($uObj);
print_r($rs);
*/
/*
$usersModel = new UsersModel($model); //通用类的model 作为对象传递到usersModel中
$rows = $usersModel-> select();
print_r($rows);


$usersModel = new UsersModel($model); 
//$where = " uAge=19";
$where = "";
$order = " order by uId desc";
$rows = $usersModel->getUsersByCon($where,$order);
print_r($rows);
*/
$usersView = new UsersView();
$usersView->listUsers();









