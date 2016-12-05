<?php
//用户数据的处理页面  增 删  改
$link = @mysql_connect("localhost","root","root") or die("连接失败:".mysql_error());
mysql_select_db("pro",$link);
mysql_query("set names utf8");

$act = $_GET["act"];  //路径传值
if($act=="add"){
	$uName 		= $_POST["uName"];
	$uPwd			= $_POST["uPwd"];
	$uSex	 		= $_POST["uSex"];
	$uTel	 		= $_POST["uTel"];
	$uEmail 		= $_POST["uEmail"];
	
	//变量写入字符串     整形  {$a}  字符串'{$a}'  日期 '{$a}'
	$sql = "insert into users(uName, uPwd, uSex, uTel, uEmail) values('{$uName}', '{$uPwd}', '{$uSex}', '{$uTel}', '{$uEmail}')";
	if(mysql_query($sql)){
		echo "用户添加成功";
	}else{
		echo "用户添加失败";
	}
}else if($act=="delete"){
	$uId = $_GET["uId"];
	$sql = "delete from users where uId={$uId}";
	if(mysql_query($sql)){
		echo "用户删除成功";
	}else{
		echo "用户删除失败";
	}
}else if($act=="update"){
	$uId = $_GET["uId"];
	$uName 		= $_POST["uName"];
	$uPwd			= $_POST["uPwd"];
	$uSex	 		= $_POST["uSex"];
	$uTel	 		= $_POST["uTel"];
	$uEmail 		= $_POST["uEmail"];
	$sql = "update users set  uName='{$uName}', uPwd='{$uPwd}', uSex='{$uSex}', uTel='{$uTel}', uEmail='{$uEmail}'   where uId={$uId}";
	if(mysql_query($sql)){
		echo "用户修改成功";
	}else{
		echo "用户修改失败";
	}
}
