<?php
header("content-type:text/html;charset=utf-8");
include("fun/inc.php"); //配置文件
include("fun/mysql.fun.php"); //自定义的数据操作函数文件
conn($db["dbHost"] ,$db["user"],$db["pwd"],$db["dbName"]);
//$sql = "insert into users(uName) values('sssssssss')";
//$sql = "select * from users";
//$result = query($sql);
//echo $result;
//$count = numRows($sql);
//echo $count;
//$sql = "select * from users where uid=1";
//$rs = fetchOne($sql);
//print_r($rs);
$sql = "select * from users";
$rs = fetch($sql);
print_r($rs);
close();

