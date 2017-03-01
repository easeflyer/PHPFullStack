<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$arr = array("aaaa","bbbb","ccccc","dddd");
$st->assign("arr",$arr);




$st->display("index.html");