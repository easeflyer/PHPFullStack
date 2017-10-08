<?php
header("Content-type:text/html;charset=utf-8");
include("libs/Smarty.class.php");
$st = new Smarty();


$st->display('mypage.html');
