<?php
class testPrivate{
	private $name = "lisi";
	private $sex = "nan";
	private function demo(){
		echo "aaaa";
	}
	function demo1(){ //共有方法 调用了一个似有方法。
		$this->demo();
	}
}
$pr = new testPrivate();
//echo $pr->name;
//$pr->demo1();
class testSon extends testPrivate{
	function demo3(){
		echo $this->name;  //不可以访问。
	}
}
$s = new testSon();
$s->demo3();









