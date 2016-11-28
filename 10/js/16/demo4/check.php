<?php

//连接数据库:
$link = mysql_connect("localhost", "root", "");
mysql_query("set names utf8"); // 用utf-8编码
mysql_select_db("think", $link); // 选择数据库
$un = $_GET["un"];
$sql = "select *  from think_users where uName='{$un}'";  
$result = mysql_query($sql);    // 执行查询
$count = mysql_num_rows($result); // 返回记录集
if ($count <= 0) { //没有输出1
    echo 1;
} else {
    echo 2;
}
?>