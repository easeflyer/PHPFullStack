<?php
//创建session
session_start(); //开启session会话
$_SESSION["un"] = "zhangsan"; // session 数组赋值

setcookie("up","abc123",time()+3600); //php.ini 4096   output_buffering = On 重启apache

echo $_SESSION["un"]."<br />";
echo session_id()."<br />";

