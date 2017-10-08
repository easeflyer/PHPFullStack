<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$_SESSION["uName"]="zhangsan";

//$id = $_GET["id"];
//echo $id;

/* 被省略的过程 不需要手动 赋值
 * $st->assign("smarty",array(
 * 		"session"=>$_SESSION,
 * 		"get"=>$_GET,
 * ))
 * */

$st->display("index.html");