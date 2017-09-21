<?php
define("CLIENT_MULTI_RESULTS",131072);
$conn = mysql_connect("localhost","root","",1,CLIENT_MULTI_RESULTS);
//$conn = mysql_connect("localhost","root","");
//CLIENT_MULTI_RESULTS 客户端 获取结果集  --> 通知mysql服务器，客户端可以处理 多条sql 或 存储过程执行的结果集
mysql_select_db("test",$conn);
mysql_query("set names utf8");
$result = mysql_query("call func2()",$conn);//页面中调用存储过程
while($rs=mysql_fetch_assoc($result)){
	print_r($rs);
	echo "<br />";
}

?>