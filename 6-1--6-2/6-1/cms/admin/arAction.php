<?php
header("content-type:text/html;charset=utf-8");
include("fun/inc.php");
include("fun/mysql.fun.php");
$act = $_GET["act"];
if($act=="insert"){
	$nTitle = $_POST["nTitle"];
	$nSource = $_POST["nSource"];
	$nSourceName = $_POST["nSourceName"];
	$cgId = $_POST["cgId"];
	$cNum = explode("_",$cgId);
	
	$nContent = $_POST["nContent"];
	$nDate = date("Y-m-d");
	$sql = "insert into news(nTitle, nSource, nSourceName, nDate, nContent, cFid, cSid) ";
	$sql.= " values('{$nTitle}', '{$nSource}', '{$nSourceName}', '{$nDate}', '{$nContent}', {$cNum[1]}, {$cNum[2]})";
	echo $sql."<br />";
	echo query($sql);
	
}else if($act=="delete"){
	$nId = $_GET["nId"];
	$sql = "delete from news where nId={$nId}";
	query($sql);
}else if($act=="update"){
	$nId = $_GET["nId"];
	$nTitle = $_POST["nTitle"];
	$nSource = $_POST["nSource"];
	$nSourceName = $_POST["nSourceName"];
	$cgId = $_POST["cgId"];
	$cNum = explode("_",$cgId);
	$nContent = $_POST["nContent"];
	$nDate = date("Y-m-d");
	$sql = "update news set nTitle='{$nTitle}', nSource='{$nSource}', nSourceName='{$nSourceName}', nDate='{$nDate}', nContent='{$nContent}', cFid={$cNum[1]}, cSid={$cNum[2]} where nId={$nId}";
	query($sql);
	
	
}