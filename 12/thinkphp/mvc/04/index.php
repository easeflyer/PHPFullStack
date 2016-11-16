<?php
include 'model/Model.class.php'; //数据库通用类 负责数据库交互
include 'model/UsersModel.class.php'; //数据库 users表操作的类
include "view/UsersView.class.php";
include "controller/UsersController.class.php";
$model = new Model("localhost","root","","utf8","mvc");
$um = new UsersModel($model); //实例化 users表的对象。
$us = new users();
$uv = new UsersView($model);
$c = new controller($model,$um,$us,$uv);

/*
if($_GET["a"]){
	if($_GET["a"]=="addView"){		
		$uv->addView();
	}else if($_GET["a"]=="addData"){		
		$us->uName=$_POST["uName"];
		$us->uPwd=$_POST["uPwd"];
		$us->uAge=$_POST["uAge"];		
		$uv->addData($um,$us);
	}else if($_GET["a"]=="updateView"){ //展示旧记录的修改页面		
		$us->uId = $_GET["uId"];		
		$uv->updateView($um,$us);
	}else if($_GET["a"]=="updateShowDo"){		
		$us->uId = $_GET["uId"];
		$us->uName=$_POST["uName"];
		$us->uPwd=$_POST["uPwd"];
		$us->uAge=$_POST["uAge"];		
		$uv->updateShowDo($um,$us);
	}else if($_GET["a"]=="del"){		
		$us->uId = $_GET["uId"];		
		$uv->del($um,$us);
	}
}else{ //a 参数为空的时候 始终显示的列表页面。	
	$uv->listUsers($um);
}
*/







