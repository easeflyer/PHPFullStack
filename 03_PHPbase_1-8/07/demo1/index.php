<?php

header("content-type:text/html;charset=utf-8");
echo "<br />--------无参数 无返回值--------------<br />";

//从1 打印到5 
function echoNum() {
    for ($i = 1; $i <= 5; $i++) {
        echo $i . "<br />";
    }
}

echoNum();

echo "<br />--------有参数 无返回值--------------<br />";

function echoNum1($n, $m) {  //sin(30)
    for ($i = 1; $i <= $n; $i++) {
        echo $i ." m:" . $m . "<br />";
    }
}

echoNum1(10, 20);
echo "<br />--------有参数 有返回值--------------<br />";

//从1+++$n;
function sumNum($n) {
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        $s = $s + $i;
    }
    return $s;  //可以给函数外的变量赋值
}

$nu = sumNum(5);
echo $nu;

echo "<br />--------递归函数  从1加到5--------------<br />";

function sum($n) {
    if ($n == 1) {
        return 1;               // 退出条件
    } else {
        return $n + sum($n - 1);// 函数过程 + 调用自己
    }
}
// 5 + 4 + 3 + 2 + 1
echo sum(5);
/*
 *  程序推演：
 * sum(5);
 * return 5+sum(4);
 * 	return 4+sum(3);
 *          return 3+sum(2);
 *              return 2+sum(1);
 *                  return 1;
 * */


echo "<br />-------- 回调函数 --------------<br />";

error_reporting(E_ALL);
function increment(&$var)
{
    $var++;
}

$a = 0;
call_user_func('increment', $a);  // 5.3 之前
echo "a:" . $a."\n";
$a = 0;
call_user_func_array('increment', array(&$a)); // You can use this instead before PHP 5.3
echo "a:".$a."\n";

echo "<br />-------- 回调函数1  5.3之后支持。--------------<br />";

$func1 = function($n){
  echo $n;  
};

function func($a,$fun){
    $fun($a);
}


func(3333,$func1);