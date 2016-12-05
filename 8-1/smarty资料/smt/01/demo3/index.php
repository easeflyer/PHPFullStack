<?php
header("content-type:text/html;charset=utf-8");
require("libs/Smarty.class.php");
$st = new Smarty();

//ĞŞ¸Äsmarty¶¨½ç·û
$st->left_delimiter = "<{";
$st->right_delimiter = "}>";

$uName = "zhangxiaosan";
$st->assign("uName",$uName);

$st->display("index.html");