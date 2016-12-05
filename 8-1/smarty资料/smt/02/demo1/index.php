<?php
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$str = "我很爱国";
$st->assign("str",$str);


$st->display("index.html");