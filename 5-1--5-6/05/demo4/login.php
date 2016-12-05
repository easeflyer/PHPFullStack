<?php
header("content-type:text/html;charset=utf-8");
//连接 数据库
//注册 添加会员的过程
$uName = trim($_POST["uName"]);
$modeun = "/^\w{6,18}$/";
if(preg_match($modeun,$uName,$arr)){
}else{
	echo "用户名格式不正确<br />";
}
$uPwd = $_POST["uPwd"];
echo $uPwd;
$uEmail = $_POST["uEmail"];   // aa@aa.com
$modeue = "/^[a-zA-Z0-9_]{1,}@[a-zA-Z0-9_]{2,}\\.(com|net|cn|org)$/";
if(preg_match($modeue,$uEmail,$arr)){
		echo "ok";
}else{
	echo "邮箱格式不正确<br />";
}
$uTel = $_POST["uTel"];
$modeut = "/^\d{11}$/"; //电话
if(preg_match($modeut,$uTel,$arr)){
		echo "ok";
}else{
	echo "手机格式不正确<br />";
}
$uCard = $_POST["uCard"];
$modeut = "/^\d{17}(x|\d)$/"; //身份证



/*
echo $uName;
$uCard = $_POST["uCard"];
echo $uCard;
*/