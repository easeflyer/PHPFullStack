<?php
header("content-type:text/html;charset=utf-8");
include("fun/inc.php");
include("fun/mysql.fun.php");
$act = $_GET["act"]; //act 是一个状态值，执行 增 删 改
if($act == "insert"){
	$cgId = $_GET["cgId"];
	$cgName = $_POST["cgName"];
	$sql ="insert into category (cgPid,cgName) values({$cgId},'{$cgName}')";
	query($sql);
}else if($act=="delete"){
	$cgSid = $_GET["cgSid"];
	$sql = "delete from category where cgId={$cgSid}";
	query($sql);
}else if($act=="update"){
	$cgName = $_POST["cgName"];
	$cgSid = $_GET["cgSid"];
	$sql = "update category set cgName='{$cgName}' where cgId={$cgSid}";
	query($sql);
}