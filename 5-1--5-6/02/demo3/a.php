<?php
//创建session
session_start(); //开启session会话
$_SESSION["un"] = "zhangsan"; // session 数组赋值

setcookie("up","abc123",time()+3600); // 注意第三个参数：时间戳   php.ini 4096   output_buffering = On 重启apache

echo $_SESSION["un"]."<br />";
echo session_id()."<br />";  // 输出一个 id 用于唯一标示一个客户端 或者说一个用户。

