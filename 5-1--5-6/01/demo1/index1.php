<?php
header("content-type:text/html;charset=utf-8");
$link = @mysql_connect("localhost","root","") or die("数据库连接错误:".mysql_error()) ;
mysql_select_db("test",$link);
mysql_query("set names utf8");
$sql = "select * from users";//可以写各种查询;
$result = mysql_query($sql); //执行查询语句  返回资源（结果集的资源地址）
//echo $result;
//echo $link;

/*
注意下面 每执行一次 mysql_fetch_array 记录指针都自动向下移动。
*/


$rs = mysql_fetch_array($result);
print_r($rs);
echo "<br />=========================1===========================<br />";
echo $rs["id"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["id"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["id"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo $rs["id"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
$rs = mysql_fetch_array($result);
echo "****".$rs["id"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
echo "<br />=========================2===========================<br />";

/**
修改 mysql_fetch_array 第二个参数 可以返回 不同类型的数组。
 * MYSQL_NUM  数字下标
 * MYSQL_ASSOC   关联数组 字段下标
*/
?>
<table border="1">
<?php
while($rs = mysql_fetch_array($result,MYSQL_ASSOC)){
	echo "<tr><td>".$rs["id"]."</td><td>".$rs["uName"]."</td><td>".$rs["uTel"]."</td></tr>";
	//print_r($rs);
	//echo "<br />";
}
?>
</table>
<?php
/*
while($rs = mysql_fetch_assoc($result)){  // 字段名下标
	//echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
	print_r($rs);
	echo "<br />";
}

while($rs = mysql_fetch_row($result)){ // 数字下标
	//echo $rs["uId"]."-->".$rs["uName"]."-->".$rs["uTel"]."<br />";
	print_r($rs);
	echo "<br />";
}
*/
$count = mysql_num_rows($result);  // 返回查询出来的记录条数。 和  mysql_affected_rows 不同。后者是影响的记录条数。
echo $count;

mysql_close($link);










