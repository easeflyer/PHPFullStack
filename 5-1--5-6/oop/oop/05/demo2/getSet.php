<?php
class getSet{
	private $name = "zhangsan";
	private $age = 20;
	function  demo(){
		echo 1111;
	}
	//__set();
	function __set($n,$v){  //$n 属性名称    $v 属性值。 
		$this->$n = $v;
	}
	//__get();
	function __get($na){
		return $this->$na;
	}
}
$gs = new getSet();
$gs->name = "jack"; // 自动调用__set()   $n = "name"  $v = "jack"
//$gs->age = 111; 
echo $gs->name; //自动调用__get();   $na = name



