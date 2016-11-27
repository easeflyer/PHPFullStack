<?php
// 连接数据库  参数：地址，用户名，密码
$link = mysql_connect("localhost","root","");
mysql_query("set names utf8");  // 设置以utf8方式访问数据库
mysql_select_db("test",$link);   // 选择数据库 mysql 中保存有多个互相独立，或者相关的多个数据库。
$sql = "select * from users";   // 查询语句：用于确定要查询的数据
$result = mysql_query($sql);	// 执行查询 返回结果指针

// mysql_fetch_assoc 一次返回一行数据 (键 就是 字段名)，没有更多数据返回false 退出循环;
while($rs = mysql_fetch_assoc($result)){  // 获取结果中的1行数据
	$rows[] = $rs;
}
//print_r($rows);
echo json_encode($rows);
?>
