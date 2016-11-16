<?php
$arr1 = array(); //admin 的配置
$arr2 = include './config.inc.php'; //从index.php入口文件算起，引入数据库连接文件
return array_merge($arr1,$arr2); //拼接两个数组
?>