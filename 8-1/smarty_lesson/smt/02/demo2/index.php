<?php
session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";

$_SESSION["uName"]="zhangsan";

//$id = $_GET["id"];
//echo $id;

/*
 * $st->assign("smarty",array(
 * 		"session"=>$_SESSION,
 * 		"get"=>$_GET,
 * ))
 * */

$st->display("index.html");