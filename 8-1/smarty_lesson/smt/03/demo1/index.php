<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";


//开启缓存
$st->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
//指定缓存的生命期:
$st->setCacheLifetime(300);
//禁止 重新生成缓存文件
$st->setCompileCheck(false);
//检测文件是否缓存过，如果缓存过 ，就不在缓存
if(!$st->isCached("index.html")){
	$myId = 5;
}
$st->display("index.html");