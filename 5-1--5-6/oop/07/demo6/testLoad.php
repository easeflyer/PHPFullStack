<?php
//自动执行 include "two.php";
//自动执行 include "one.php";
header("content-type:text/html;charset=utf-8");
function __autoload($className){
        //$path = "classpath/";
    
	include $className.".php";
        
}

$tl = new two();  //会自动调用__autoload    $className = $类名称
$tl->demo();

$o = new one();//会自动调用__autoload    $className = one
$o->test();
