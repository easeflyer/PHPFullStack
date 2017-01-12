<?php
header("content-type:text/html;charset=utf-8");
class testToString{
	private  $name;
	function __construct($n){
		$this->name = $n;
	}
	function test(){
		echo 11111;
	}
	
	function __toString(){
		return "该类的222字符串对象";
	}
	
}
$tts =  new testToString("zhangsan");
echo $tts;  
//默认情况下 对象不能作为字符串输出。   Object of class testToString could not be converted to string  去掉 __toString 后。
//有__toString() , 在输出对象的时候，将执行toString方法。***













