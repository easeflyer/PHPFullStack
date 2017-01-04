<?php
//获得数据库中的记录，循环把记录组装成一个二维数组；

$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("news");
$sql = "select * from article";

$result = mysql_query($sql);
$rows = array();
while($rs = mysql_fetch_assoc($result)){   // 获得一条记录的关联数组
	//echo $rs["aTitle"]."<br />";
	$rows[] = $rs;
}
print_r($rows);
