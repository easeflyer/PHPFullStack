<?php
class testPublic{
	public $name = "zhangsan";
	public $age = 19;
	function demo(){  //默认function public
		echo "aaaaa";
	}
	function demo2(){
		echo $this->age;
	}
}
$s = new testPublic();
echo $s->demo();
$s->demo2();
echo "<br />-------------------------<br />";
class testSon extends testPublic{
	function demo3(){
		echo $this->name;
	}	
	function demo4(){
		$this->demo(); //?????
	}
}
$ts = new testSon();
$ts->demo3();










