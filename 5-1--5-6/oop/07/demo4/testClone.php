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
		echo "克隆一个对象<br />";
	}
}

$tc = new testClone("zhangsan");
//$tc->test();

$tc1 = $tc; //传对象的地址 给 tc1
$tc1->name="李四";
$tc1->test();
$tc->test();
echo "<br />================================================================<br />";
$tc1 = clone $tc;  //自动__clone();
$tc1->name = "aaaaaa";
echo '$tc1->test():';
$tc1->test();  
echo '$tc->test():';
$tc->test();
//克隆：是复制 对象变成了两个，而引用赋值，两个变量指向同一个对象。
//所有的内容包括方法 属性  值都可以复制一份








