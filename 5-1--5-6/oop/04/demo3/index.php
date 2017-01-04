<?php
class fa{
	public $money = 100;
	public  $name;
	public $age;
	function __construct($n,$a){
		$this->name = $n;
		$this->age = $a;
		echo "***".$this->name;
	}
	function car(){
		echo "aaaaaaa<br />";
	}
}
class son extends  fa{
	function house(){
		echo "bbnbbb<br />";
	}
}
$na = "zhangsan";
$ag = 20;
$s = new son($na,$ag); //子类在继承父类 ，构造 方法被同样继承。传参也是在实例化 的时候完成的。

echo "<br />";
$s->house();








