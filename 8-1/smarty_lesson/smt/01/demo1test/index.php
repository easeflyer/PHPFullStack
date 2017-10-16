<?php
//导入入口文件
include("libs/Smarty.class.php");
//实例化 smarty对象
$st = new Smarty();
/*
$st->setTemplateDir("tpl/");  模板目录栏  默认为 templates 目录
$st->setCacheDir("cc/");	缓存目录
$st->setConfigDir("cf/");	配置文件目录
$st->setCompileDir("tc/"); 编译文件目录
*/
$st->display("index.html"); // templates/index.html -->index.html

