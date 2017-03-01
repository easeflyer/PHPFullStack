<?php
session_start();
header("content-type:text/html;charset=utf-8");
include("libs/Smarty.class.php");
$link = mysql_connect("localhost","root","");
mysql_query("set names utf8");
mysql_select_db("com",$link);


$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter="}>";