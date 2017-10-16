<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$str = "我很爱国";
$st->assign("str",$str);

$dt = time();
$st->assign("dt",$dt); // 2014-13-13 12:12:12

$st->display("index.html");
