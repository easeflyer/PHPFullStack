<?php
class Hero{  //类名称 与 文件名称相同
	//属性定义
	public $userName; //public 表示每一个英雄个体，都有名字
	public $userSex ; 
	public $userAge;	
	//方法定义：
	function dazhang(){
		echo "在打仗";
	}
	function eat(){
		echo "在吃饭";
	}
}

$zhangfei  = new Hero(); // 实例化英雄泪
print_r($zhangfei);
/*
 * echo $zhangfei;
Catchable fatal error: Object of class Hero could not be converted 
to string in F:\AppServ\www\oop\01\demo1\Hero.class.php on line 17
var_dump()
print_r();
*/





