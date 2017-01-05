<?php
header("content-type:text/html;charset=utf-8");
// mysql_connect("主机名称/ip","用户名","密码")
$link = @mysql_connect("localhost","root","") or  die("连接错误:".mysql_error());  //Resource id #2
// 连接成功     die() 输出（）中内容，终止后边程序
// or 语句 如果前面的执行成功，后面的就不执行了。如果不成功，则执行后面的语句。
// No such file or directory 说明数据库没有打开。
// mysql_select_db("数据库名称",$link);
mysql_select_db("pro",$link);
mysql_query("set names utf8"); // 告诉 mysql 采用 utf8 编码
//执行sql语句：  sql语句在php中是以字符串的形式存在的。*******
$sql = "insert into users(uName, uPwd, uSex, uTel, uEmail) values('小刘','1234567','2','13212345678','cc@aa.com')";
//$sql = "update users set uName='小明' where uId=5";
//$sql = "delete from users where uId=2";
// mysql_query(); 向数据库发送一条sql命令，理解: 执行sql 。  返回资源
mysql_query($sql);
//mysql_affected_rows() 取得前一条sql语句 返回受影响的行数。
echo mysql_affected_rows();
mysql_close($link);
