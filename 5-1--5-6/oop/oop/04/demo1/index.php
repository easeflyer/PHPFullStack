<?php
class  fa{  //父类
	public $money = 100;
	function car(){
		echo "能载人和拉货";
	}
}
class son extends fa{ //子类  可以继承父类的属性和方法。
	
	function house(){
		echo "自己买房";
	}
	function demo(){
		echo "自己盖房子";
	}
	function demo1(){
		//调用父类的car方法 ，$this->关键字
		$this->car();
		echo "去山东";
		
	}
}
$s = new son();
//以下属性和方法 是继承父类
//echo $s->money ."<br />";
//$s->car();
//子类中拥有。
//$s->house();
//$s->demo();
$s ->demo1();



