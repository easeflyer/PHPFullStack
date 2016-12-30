<?php
class test{
	public $name;
	public $age;
	function demo(){
		echo 1111;
	}
}
$t = new test(); //创建对象

$t1 = $t;  // 传递的引用

$t1->name = "张三";

echo $t->name;