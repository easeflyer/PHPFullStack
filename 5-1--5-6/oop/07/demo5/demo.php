<?php
header("content-type:text/html;charset=utf-8");
class demo2{
	private $name;
	private $age;
	private $sex;
	function __construct($n="",$a="",$s=""){
		$this->name = $n;
		$this->age = $a;
		$this->sex = $s;
	}
	function getName(){
		echo $this->name;
	}
	
	function __sleep(){  //序列化对象的时候自动调用。
		//传递一个数组 $arr 
		//print_r(array("name","age","sex"));
		echo "调用了 __sleep()<br />";
                return array('name','age','sex');  // 返回几个属性，就有几个属性被序列化。
	}
	function __wakeup(){
		echo "正在反序列化<br />";
	}
}