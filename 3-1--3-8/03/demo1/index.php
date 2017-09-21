<?php
header("content-type:text/html;charset=utf-8");
$a = "123";
$b = 10;
$c = $a+$b; // "123"==> 123    + 10;
echo $c;
echo "<br />----------boolean-------------<br />";
$aa = true; // 1
$bb = 1;
echo $aa+$bb; //2
echo "<br />-----------false------------<br />";
$cc = false;    // 0
$dd = 1;
echo $cc+$dd;  //1
echo "<br />-----------string------------<br />";
$bl = "";
$num= 1;
echo $bl+$num;  //1

$arr = array(1,2,3,4);  
echo "arr:" . $arr;


echo "<br />------------转换成数值型-----------<br />";
$num1 = 3;
$str = "3e+3"; //字符串  科学计数法 3后面3个0 ;浮点型  （科学计数法 e 代表 3e+2 就是 3 后面2个零）
//echo $num1+$str;
$sum1 = $num1+$str;  //隐式转换
var_dump($sum1);  //浮点型  var_dump();返回变量的数据类型

echo "<br />------------转换成数值型2-----------<br />";
$str2 = "20.5";
$num2 = 5;
$sum2=$str2+$num2;  // 注意用的 + 号，如果用 . 号则不同
var_dump($sum2);

echo "<br />------------显 式转换-----------<br />";

$a = 10;
$b = "5";
$c = (string)$a . $b . "<br />";
echo $c;


$d = 10;
$e = 3.3;        
$f = $d + $e;

echo (int)$f;  // 13
