<?php
//连接数据库:
$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("test",$link);
$un = $_GET["un"];
$sql = "select *  from users where uName='{$un}'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
if($count<=0){ //没有输出1
	echo 1;
}else{
	echo 2;
}
?>