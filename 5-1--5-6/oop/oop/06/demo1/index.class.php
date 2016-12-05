<?php
class demo{
	private $name = "zhangsan";
	
	function __construct($n){
		$this->name = $n;
	} 
	//使用频率不高  了解。
	private function __isset($na){
		return isset($this->$na);
	}
	//删除私有属性;
	private  function __unset($na){
		unset($this->$na);
	}
}
$d = new demo("lisi");
if(isset($d->name)){  //调用了__isset() 方法 检测 $d->name 是否是似有属性
	echo "ok";
}else{
	echo "no";
}
unset($d->name); //调用用__unset() 方法。



