<?php
header("content-type:text/html;charset=utf-8");
class test{
	public $name = "zhangsan";
	public $age = 18;
	public  $height = 175;
	function eat(){
		echo "在吃饭";
	}
	function play(){
		echo "完玻璃球";
	}
	function demo(){
		echo $this->name;
	}
}
/*
$t1 = new test();
$t1->name = "小燕子";
echo $t1->name;
//创建第二个对象
$t2 = new test();
$t2->name = "小张";
echo $t2->name;
*/
$t3 = new test();
$t3->name = "小刘";
$t3->demo();

$t4 = new test();
$t4->name = "小王";
$t4->demo();






