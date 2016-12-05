<?php
header("content-type:text/html;charset=utf-8");
class testClone{
	public  $name;
	function __construct($n){
		$this->name = $n;
	}
	function test(){
		echo $this->name ."<br />";
	}
	function __clone(){
		echo "克隆一个对象";
	}
}
$tc = new testClone("zhangsan");
$tc->test();
/*
$tc1 = $tc; //传对象的地址 给 tc1
$tc1->test();
*/
$tc1 = clone $tc;  //自动__clone();
$tc1->name = "aaaaaa";
$tc1->test();  
//克隆：可以吧 原来 对象的 
//所有的内容包括方法 属性  值都可以复制一份








