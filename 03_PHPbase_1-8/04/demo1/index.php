<?php
date_default_timezone_set("Asia/Shanghai");  // 设定时区
echo "<br />------------Math----------------------<br />";
$ma = max(12,45,5,8,7.2); // 最大值
echo $ma."<br />";
$mi = min(34,2,4,8,4.6); // 最小值
echo $mi."<br />";
$num1 = 3.1;
$ce = ceil($num1);  // 进位取整
var_dump($ce);
echo "<br />";
$num2 = 5.9;
$fl = floor($num2);  // 舍去取整
echo "fl:".$fl."<br />";
$num3 = 3.5;

$ro = round($num3);  // 四舍五入
echo "ro:".$ro."<br />";


$ra = rand(10000,99999);
echo "ra:". $ra."<br />";


$mt = mt_rand(1000,9999);  // 这个随机数 函数效率更高，快4倍
echo "mt:".$mt;

echo "<br />----------------date--------------------<br />";
$dtNum = time();
echo "time:".$dtNum ."<br />";


$dt = date("Y/m/d H:i:s",1500046614);
echo "date:".$dt."<br />";

$ti = time(); //现在的时间戳
$ti5 = $ti+5*24*3600;
$dt2 = date("Y-m-d H:i:s",$ti5);
echo "dt2:".$dt2."<br />";

$randTime = "2008-12-3 3:3:3";
$randTime1 = "2017/07/14 23:36:54";
$dtNum1 = strtotime($randTime1);
echo "dtNum1:".$dtNum1;


echo "<br />----------string---------------<br />";
$str1 = "abcdefghijklmnopqrstuvwxyz";   //14    字符位置是从 0--13
echo strlen($str1)."<br />";


echo strtolower($str1)."<br />";
echo strtoupper($str1)."<br />";
$str2 = "father was a self-taught mandolin player. he was one of the best string instrument players in our town. he could not read music, but if he heard a tune a few times, he could play it";
echo "ucfirst:".ucfirst($str2)."<br />";
echo "ucwords:".ucwords($str2)."<br />";
$str3 = "hello world";
echo "strrev:".strrev($str3)."<br />";
$str4 = " abcdefg ";
$str5 =     trim($str4);
echo "strlen:str5:".strlen($str5)."<br />";
$str6 = "aaaazhangsanaaaaaaaa";
echo "str_replace:".str_replace("zhangsan", "***", $str6)."<br />";
$str7 = "abcdecfghijklmn";
echo "strpos:".strpos($str7, "d");  //  查找字符首次出现的位置
$str8 = "abcdefghijklmn";
echo "<br />";
echo "substr:".substr($str8,2,3);   // string substr ( string $string , int $start [, int $length ] ) 截取字符串
echo "<br />";
echo "-6:".substr($str8,-6,3)."<br />"; // $start 负值 从后面算起
$str9 = "123456";
echo md5($str9);

