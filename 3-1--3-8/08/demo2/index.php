<?php
header("content-type:text/html;charset=utf-8");
$str = "ab";
echo serialize($str)."<br />";//s:2:"ab";  类型:长度：值
$i = 7;
echo serialize($i)."<br />";  // 类型:值
$f = 3.14;
echo serialize($f)."<br />"; //d: 近似值
$b = true;
echo serialize($b)."<br />"; //类型: 1,0表示的值
$arr = array(123,"zhangsan","nan");
echo serialize($arr); //a:3:{下标类型i:下标值0;i:123;i:1;s:8:"zhangsan";i:2;s:3:"nan";}
echo "<br />-----------把序列化后的数组写入文件-----------<br />";
$handle = fopen("a.txt","a+");
fwrite($handle,serialize($arr));
fclose($handle);

