<?php
header("content-type:text/html;charset=utf-8");
echo "<br />--------无参数 无返回值--------------<br />";
//从1 打印到5 
function echoNum(){
	for($i=1;$i<=5;$i++){
		echo $i."<br />";
	}
}
echoNum();

echo "<br />--------有参数 无返回值--------------<br />";
function echoNum1($n,$m){  //sin(30)
	for($i=1;$i<=$n;$i++){
		echo $i."<br />";
	}
}
echoNum1(10,20);
echo "<br />--------有参数 有返回值--------------<br />";
//从1+++$n;
function sumNum($n){
	$s = 0;
	for($i=1;$i<=$n;$i++){
		$s = $s+$i;
	}
	return $s;  //可以给函数外的变量赋值
}
$nu = sumNum(5);
echo $nu;

echo "<br />--------递归函数  1+++5--------------<br />";
function sum($n){
	if($n==1){
		return 1;
	}else{
		return $n+sum($n-1);
	}
}
$m = sum(5);
/*
 * $m = sum(5);
 * 			return 5+sum(4);
 * 							return 4+sum(3);
 * 											return 3+sum(2);
 * 															return 2+sum(1);
 * 																			return 1;
 * */




















