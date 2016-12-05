<?php
header("content-type:text/html;charset=utf-8");
include("fun/inc.php");
include("fun/mysql.fun.php");
$act = $_GET["act"]; //act 是一个状态值，执行 增 删 改
if($act=="insert"){
	$cgName = $_POST["cgName"];
	$sql ="insert into category (cgPid,cgName) values(0,'{$cgName}')";
	query($sql);
}else if($act=="delete"){
	$cgId = $_GET["cgId"];
	$sql = "delete from category where cgId={$cgId}";
	query($sql);
}else if($act=="update"){
	$cgId = $_GET["cgId"];
	$cgName = $_POST["cgName"];
	$sql = "update category set cgName='{$cgName}' where cgId={$cgId}";
	query($sql);
}
