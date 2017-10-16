<?php
header("content-type:text/html;charset=utf-8");
class test{
	public $name;
	function demo(){
		echo 11111;	
	}
        // __call(funName,arr)    :如果对象调用不存在的方法，会自动调用__call();用来处理 自定错误。
	function __call($val1,$arr){  // $val1 方法名称， $arr 参数数组
		echo "这是不存在的方法的名字：".$val1."<br />"; //方法名称
		print_r($arr);  //参数构成的数组
		echo "<br />";
		echo "你调用的这个方法 $val1 ，不存在";
	}
}

$t = new test();
$t->demo1("aaa","bbb"); //如果demo1 不存在 会自动调用 __call