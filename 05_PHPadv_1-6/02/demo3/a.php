<?php
//创建session
// http://192.168.0.50:8081/5-1--5-6/02/demo3/b.php   尝试
session_start(); //开启session会话
$_SESSION["sn"] = "zhangsan"; // session 数组赋值

setcookie("ck","abc123",time()+3600); // 注意第三个参数：时间戳，过期时间   php.ini 4096   output_buffering = On 重启apache  3600秒
echo "session:".$_SESSION["sn"]."<br />";
echo "session_id:".session_id()."<br />";  // 输出一个 id 用于唯一标示一个客户端 或者说一个用户。

