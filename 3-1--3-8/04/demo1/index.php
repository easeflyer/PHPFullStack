<<<<<<< HEAD
﻿<?php
date_default_timezone_set("Asia/Shanghai");
echo "<br />------------Math----------------------<br />";
$ma = max(12,45,5,8,7.2);
echo $ma."<br />";
$mi = min(34,2,4,8,4.6);
echo $mi."<br />";
$num1 = 3;
$ce = ceil($num1);
var_dump($ce);
echo "<br />";
$num2 = 5.9;
$fl = floor($num2);
echo $fl."<br />";
$num3 = 3.5;

$ro = round($num3);
echo $ro."<br />";


$ra = rand(10000,99999);
echo $ra."<br />";


$mt = mt_rand(1000,9999);
echo $mt;

echo "<br />----------------date--------------------<br />";
$dtNum = time();
echo $dtNum ."<br />";


$dt = date("Y-m-d H:i:s");
echo $dt."<br />";

$ti = time(); //现在的时间戳
$ti5 = $ti+5*24*3600;
$dt2 = date("Y-m-d H:i:s",$ti5);
echo $dt2."<br />";

$randTime = "2008-12-3 3:3:3";
$dtNum1 = strtotime($randTime);
echo $dtNum1;


echo "<br />----------string---------------<br />";
$str1 = "abcdeAGFDGfghGFDGFDijklmn";   //14    字符位置是从 0--13
echo strlen($str1)."<br />";


echo strtolower($str1)."<br />";
echo strtoupper($str1)."<br />";
$str2 = "father was a self-taught mandolin player. He was one of the best string instrument players in our town. He could not read music, but if he heard a tune a few times, he could play it";
echo ucfirst($str2)."<br />";
echo ucwords($str2)."<br />";
$str3 = "hello world";
echo strrev($str3)."<br />";
$str4 = " abcdefg ";
$str5 = trim($str4);
echo strlen($str5)."<br />";
$str6 = "aaaazhangsanaaaaaaaa";
echo str_replace("zhangsan", "***", $str6)."<br />";
$str7 = "abcdecfghijklmn";
echo strpos($str7, "z");
$str8 = "abcdefghijklmn";
//echo substr($str8,2,3);
echo substr($str,-6,3)."<br />";
$str9 = "fdsafad";
echo md5($str9);











=======
﻿<?php
date_default_timezone_set("Asia/Shanghai");
echo "<br />------------Math----------------------<br />";
$ma = max(12,45,5,8,7.2);
echo $ma."<br />";
$mi = min(34,2,4,8,4.6);
echo $mi."<br />";
$num1 = 3;
$ce = ceil($num1);
var_dump($ce);
echo "<br />";
$num2 = 5.9;
$fl = floor($num2);
echo $fl."<br />";
$num3 = 3.5;

$ro = round($num3);
echo $ro."<br />";


$ra = rand(10000,99999);
echo $ra."<br />";


$mt = mt_rand(1000,9999);
echo $mt;

echo "<br />----------------date--------------------<br />";
$dtNum = time();
echo $dtNum ."<br />";


$dt = date("Y-m-d H:i:s");
echo $dt."<br />";

$ti = time(); //现在的时间戳
$ti5 = $ti+5*24*3600;
$dt2 = date("Y-m-d H:i:s",$ti5);
echo $dt2."<br />";

$randTime = "2008-12-3 3:3:3";
$dtNum1 = strtotime($randTime);
echo $dtNum1;


echo "<br />----------string---------------<br />";
$str1 = "abcdeAGFDGfghGFDGFDijklmn";   //14    字符位置是从 0--13
echo strlen($str1)."<br />";


echo strtolower($str1)."<br />";
echo strtoupper($str1)."<br />";
$str2 = "father was a self-taught mandolin player. He was one of the best string instrument players in our town. He could not read music, but if he heard a tune a few times, he could play it";
echo ucfirst($str2)."<br />";
echo ucwords($str2)."<br />";
$str3 = "hello world";
echo strrev($str3)."<br />";
$str4 = " abcdefg ";
$str5 = trim($str4);
echo strlen($str5)."<br />";
$str6 = "aaaazhangsanaaaaaaaa";
echo str_replace("zhangsan", "***", $str6)."<br />";
$str7 = "abcdecfghijklmn";
echo strpos($str7, "z");
$str8 = "abcdefghijklmn";
//echo substr($str8,2,3);
echo substr($str,-6,3)."<br />";
$str9 = "fdsafad";
echo md5($str9);











>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
