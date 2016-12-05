<?php
header("content-type:text/html;charset=utf-8");
class test{
	public $name;
	function demo(){
		echo 11111;	
	}
	function __call($val1,$arr){
		echo $val1."<br />"; //方法名称
		print_r($arr);  //参数构成的数组
		echo "<br />";
		echo "你调用的这个方法，没有";
	}
}
$t = new test();
$t->demo1("aaa","bbb"); //如果demo1 不存在 会自动调用 __call