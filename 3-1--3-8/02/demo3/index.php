<?php
header("content-type:text/html;charset=utf-8");
echo "<br />-----字符串---------------<br />";
$str = 'abcdefg13';
echo $str;
echo "<br />-----单 双引号---------------<br />";
$a = "abcdefg";
$b = '$a';
echo $b;
echo "<br />-----转义字符--------------<br />";
$c = "abcde\nfghijklmn";
echo $c;
echo "<br />-----转义字符2--------------<br />";
$d  = "小明说:\"今天天气不错\"";
echo $d;
echo "<br />-----整数--------------<br />";
$nu = -100;
echo $nu;
echo "<br />-----浮点型--------------<br />";
$nu1 = 3.14;
echo $nu1;
echo "<br />-----布尔型--------------<br />";
$bl = false;
echo $bl;
echo "<br />-----null--------------<br />";
$m = null;
$t ="";

echo $m==$t; // 声明变量 空    unset($m)释放变量

echo "<br />-----var_dump--------------<br />";
$q = "aaaaaaaaaa";
// 此函数显示变量的结构信息，包括类型与值。数组将递归展开值，通过缩进显示其结构。 
echo var_dump($q);











