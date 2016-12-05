<?php
header("content-type:text/html;charset=utf-8");
$a = "123";
$b = 10;
$c = $a+$b; // "123"==> 123    + 10;
echo $c;
echo "<br />-----------------------<br />";
$aa = true;
$bb = 1;
echo $aa+$bb;
echo "<br />-----------------------<br />";
$cc = false;
$dd = 1;
echo $cc+$dd;
echo "<br />-----------------------<br />";
$bl = "";
$num= 1;
echo $bl+$num;
echo "<br />------------转换成数值型-----------<br />";
$num1 = 3;
$str = "3e+2"; //字符串
//echo $num1+$str;
$sum1 = $num1+$str;
var_dump($sum1);  //浮点型

echo "<br />------------转换成数值型2-----------<br />";
$str2 = "20.5";
$num2 = 5;
$sum2=$str2+$num2;
var_dump($sum2);












