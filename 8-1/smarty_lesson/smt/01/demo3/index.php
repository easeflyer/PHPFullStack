<?php
header("content-type:text/html;charset=utf-8");
require("libs/Smarty.class.php");
$st = new Smarty();

//修改smarty定界符
$st->left_delimiter = "<{";
$st->right_delimiter = "}>";

$uName = "zhangxiaosan";
$st->assign("uName",$uName);

$st->display("index.html");