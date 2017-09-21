<?php
class index{
	public $name;
	public $age;
	//static $sex="男";
	static $num = 10;  // 人数
	function test(){
		echo "aaaa";
                self::$num++;
	}
	static function test1(){
		echo "bbbbb";
	}
	function test2(){
		//echo $this->num; //静态成员 self
		return self::$num;
	}
}


$ine = new index();
index::$num = 1+1;
$ine->name = "zhangsan";  // 对象属性 是相互独立的。
echo "****".index::$num."*****" ."<br />";
$at = new index();
$at->name="lisi";
$at->test();
echo "######".index::$num."#####" ."<br />";  // 静态属性 只有一个。

echo "ine:".$ine->name . "<br />at:" . $at->name;

