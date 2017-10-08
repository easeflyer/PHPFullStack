<?php
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";  // 修改定界符
$st->right_delimiter="}>";

$str = "我很爱国";
$st->assign("str",$str);   // 模板变量 str 赋值。


$st->display("index.html"); // 输出模板。