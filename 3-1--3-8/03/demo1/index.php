<?php
header("content-type:text/html;charset=utf-8");
$a = "123";
$b = 10;
$c = $a+$b; // "123"==> 123    + 10;
echo $c;
echo "<br />----------boolean-------------<br />";
$aa = true;
$bb = 1;
echo $aa+$bb; //2
echo "<br />-----------false------------<br />";
$cc = false;
$dd = 1;
echo $cc+$dd;  //1
echo "<br />-----------string------------<br />";
$bl = "";
$num= 1;
echo $bl+$num;  //1
echo "<br />------------转换成数值型-----------<br />";
$num1 = 3;
$str = "3e+3"; //字符串  科学计数法 3 后面 3 ;浮点型
//echo $num1+$str;
$sum1 = $num1+$str;
var_dump($sum1);  //浮点型

echo "<br />------------转换成数值型2-----------<br />";
$str2 = "20.5";
$num2 = 5;
$sum2=$str2+$num2;  // 注意用的 + 号，如果用 . 号则不同
var_dump($sum2);












