<?php
//多态的举例:
interface demo{
	//3个方法都是抽象方法。
	function fun1();
	function fun2();
	function fun3();
}

class demoSon1 implements demo{
	//子类要重写父类中所有抽象方法。
	function fun1(){
		echo "aaaaa";
	}
	function fun2(){
		echo "bbbbb";
	}
	function fun3(){
		echo "ccccc";
	}
}
class demoSon2 implements demo{
	function fun1(){
		echo "1111";
	}
	function fun2(){
		echo "2222";
	}
	function fun3(){
		echo "33333";
	}
}
//体现以下多态
class diaoyong{
	function test($str){ //根据str 来决定 调用son1中的fun1 还是 son2中的fun1   $str=$ds1
		$str->fun1();
		$str->fun2();
		$str->fun3();
	}
}
//$ds1 = new demoSon1();
//$ds2 = new demoSon2();

//$dy = new diaoyong(); //实例化   对象可以作为参数传递*****
//$dy->test($ds1);  //根据传入对象不同，该方法调用fun的内容也不同。 体现多态
//补充多态:
class work{
	function getFun(){
		$dy = new diaoyong(); //实例化   对象可以作为参数传递
		
		$ds1 = new demoSon1();
		$ds2 = new demoSon2();
		$dy->test($ds1); 
		$dy->test($ds2); 
	}
}	
$w = new work();
$w->getFun();









