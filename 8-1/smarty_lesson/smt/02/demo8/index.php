<?php

session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter = "}>";

// $arr $brr foreach 遍历

$arr = array("zhangsan", "lisi", "wangwu", "zhaoliu");
$st->assign("arr", $arr);

$brr = array(
    "uOne" => array("uName" => "zhangsan", "uAge" => 18, "uTel" => "12111111"),
    "uTwo" => array("uName" => "lisi", "uAge" => 20, "uTel" => "131111111"),
    "uThree" => array("uName" => "wangwu", "uAge" => 22, "uTel" => "141111111")
);
$st->assign("brr", $brr);


//$crr = array("a1" => "aaaaaa", "b1" => "bbbbbb", "c1" => "ccccc", "d1" => "dddddd");  报错
$crr = array( "aaaaaa", "bbbbbb",  "ccccc", "dddddd");
$st->assign("crr", $crr);


$drr = array(
    array("uName" => "zhangsan", "uAge" => 18, "uTel" => "12111111"),
    array("uName" => "lisi", "uAge" => 20, "uTel" => "131111111"),
    array("uName" => "wangwu", "uAge" => 22, "uTel" => "141111111")
);
$st->assign("drr", $drr);


$st->display("index.html");
