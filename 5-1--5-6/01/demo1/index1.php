<?php
header("content-type:text/html;charset=utf-8");
$link = @mysql_connect("localhost","root","root") or die("数据库连接错误:".mysql_error()) ;
mysql_select_db("pro",$link);
mysql_query("set names utf8");
$sql = "select * from users";//可以写各种查询;
$result = mysql_query($sql); //执行查询语句  返回资源（结果集）
/*
$rs = mysql_fetch_array($result);
echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo "****".$rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
*/

/*
while($rs = mysql_fetch_array($result,MYSQL_ASSOC)){
	//echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
	print_r($rs);
	echo "<br />";
}

while($rs = mysql_fetch_assoc($result)){
	//echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
	print_r($rs);
	echo "<br />";
}

while($rs = mysql_fetch_row($result)){
	//echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
	print_r($rs);
	echo "<br />";
}
*/
$count = mysql_num_rows($result);  //超找出来的记录数。
echo $count;

mysql_close($link);










