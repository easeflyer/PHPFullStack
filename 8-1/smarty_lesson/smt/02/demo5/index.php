<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$str = "abcdefghijk";
$st->assign("str",$str);

//指定插件的位置;
$st->addPluginsDir("Plugin/");

$st->display("index.html");