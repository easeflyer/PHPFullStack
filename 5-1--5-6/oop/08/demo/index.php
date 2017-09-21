<?php
/**
 *  抽象类 是一个类 概扩
 */

abstract class demo{  //抽象类
	abstract function test1();
	abstract function test2();
	function test3(){
		echo 111112222;
	}
}

//$d = new demo(); //抽象类不能被实例化
//$d->test3();
class demoSon extends demo{ //抽象类必须被继承 才能实例化
	//所有的抽象方法都必须被重写。
	function  test1(){
		echo "aaaaaaaaaa<br />";
	}
	function test2(){
		echo "bbbbbbbbb<br />";
	}
        
}



$ds = new demoSon();
$ds->test1();
$ds->test2();
$ds->test3();






