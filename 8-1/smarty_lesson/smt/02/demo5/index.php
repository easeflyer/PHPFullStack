<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";


$str = "abcdefghijk";
$st->assign("str",$str);

//指定插件的位置; 必须用，否则不能识别  测试时需要删除编译目录_c。
$st->addPluginsDir("Plugin/");

$st->display("index.html");