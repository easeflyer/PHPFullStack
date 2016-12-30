<?php
header("content-type:text/html;charset=utf-8");
include "demo.php";
$d = new demo("张三",10,"汉子");
$str = serialize($d); //自动调用__sleep();
echo $str."<br />";
$de = unserialize($str);