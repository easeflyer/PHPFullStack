<?php
//获取session值
// http://192.168.0.50:8081/5-1--5-6/02/demo3/b.php   尝试


session_start();
echo "sn: ".$_SESSION["sn"]."<br />";
echo "ck: ".$_COOKIE["ck"]."<br />";
print_r($_COOKIE);
