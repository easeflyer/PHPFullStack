<?php
//final class index{//用final 修饰的类不能被继承****
class index{	
	public $name;
	public $age;
	function __construct(){
	
	}
	final function test(){ //不能覆盖 final 方法。*****
		echo "aaaaa";	
	}
}
class indexSon extends index{
	function test(){ //重写了test   Cannot override final method index::test()
		echo "ccccc";
	}
	function test1(){
		echo "bbbb";
	}
}
$is = new indexSon();
$is->test();







