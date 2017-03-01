<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$webTitle = "我赢职场";
$st->assign("webTitle",$webTitle);


$st->display("index.html");