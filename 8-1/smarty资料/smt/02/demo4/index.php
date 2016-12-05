<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$str = "abcdefghijk";
$st->assign("str",$str);

//定义修饰符
function fun1($var){
		return strtoupper($var);
}
$st->registerPlugin("modifier", "fun1", "fun1");


//自定义单标记:数组：标记中所有属性构成的数组
function fun2($arr){
	$html = "<div style='font-size:".$arr["size"]."px;color:".$arr["color"]."'>".$arr["content"]."</div>";
	return $html;
}
$st->registerPlugin("function", "demo", "fun2");

//定义双标记
function fun3($arr,$con){
	$html = "<div style='color:".$arr["color"]."'>".$con."</div>";
	return $html;
}

$st->registerPlugin("block", "test", "fun3");




$st->display("index.html");