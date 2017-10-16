<?php
header("content-type:text/html;charset=utf-8");
session_start();
include 'config/DB.class.php';

$aName = strtolower($_POST["aName"]);
//用正则表达式校验一下，目的为了 如果用户名格式不正确，
//不用和数据库中数据对比了，降低服务器压力
$aPwd =  strtolower($_POST["aPwd"]);
$sql = "select * from admin where aName='{$aName}'";
//判断用户有没有，根据查询的记录数来判断   0  没有改用户 
$counts = $db->numRows($sql);
if($counts>0){
	$rs = $db->fetchOne($sql);
	if($aPwd==$rs["aPwd"]){
		//用户名 和 id 放到session会话中 后边页面如果用到 aName aId 可以直接使用
		$_SESSION["aId"] = $rs["aId"];
		$_SESSION["aName"] = $rs["aName"];
		header("location:main.php");
	}else{
		echo "用户密码不正确，请重新输入<a href='index.php'>返回</a>";
	}
}else{
	echo "账户不存在，请联系网站管理人员";
	exit;
}
