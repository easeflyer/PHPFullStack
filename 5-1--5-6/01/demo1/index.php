<?php
header("content-type:text/html;charset=utf-8");
$link = @mysql_connect("localhost","root","root") or  die("连接错误".mysql_error());  //Resource id #2
// 连接成功     die() 输出（）中内容，终止后边程序
mysql_select_db("pro",$link);
mysql_query("set names utf8");
//执行sql语句：  sql语句在php中是以字符串的形式存在的。*******
$sql = "insert into users(uName, uPwd, uSex, uTel, uEmail) values('小刘','1234567','2','13212345678','cc@aa.com')";
//$sql = "update users set uName='小明' where uId=5";
//$sql = "delete from users where uId=2";
mysql_query($sql);
echo mysql_affected_rows();
mysql_close($link);
