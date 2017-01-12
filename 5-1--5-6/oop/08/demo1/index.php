<?php
interface demo{  //定义接口
	const NAME = "aaa";  //常量属性 只能有常量属性
        //public static $age = 12; //不允许任何属性，只能有常量
	//方法必须全部都是抽象，接口中默认方法是抽象
	function fun1(); // 默认就是抽象的  省略 abstract 不写
	function fun2();
}
interface demo1{
	function fun3();
	function fun4();
}



class test implements demo,demo1{
	function fun1(){
		echo 111;
	}
	function fun2(){
		echo 2222;
	}
	function fun3(){
		echo 333;
	}
	function fun4(){
		echo 4444;
                echo self::NAME;
	}
}
$t = new  test();
$t->fun4();
















