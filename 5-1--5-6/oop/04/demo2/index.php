<?php
class fa{
	public $name = "父亲";
	public function car(){
		echo "载人和拉货<br />";
	}
}
class son extends fa{
	function house(){
		echo "买房子<br />";
	}
	function car(){
		echo "除了载人和拉货，越野和山地";
	}
	function demo(){
		//$this->car(); //子类的car
		//可以用父类名称::调用被重写的方法
		fa::car();
		//parent::car();		
	}
}
$s = new son();
//$s->house();
//$s->car();
$s->demo();

fa::car();  // static







