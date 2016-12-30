<?php
//include "testLoad.php";
//include "one.php";

function __autoload($className){

	include $className.".php";
}

$tl = new testLoad();  //会自动调用__autoload    $className = $类名称
$tl->demo();

$o = new one();//会自动调用__autoload    $className = one
$o->test();