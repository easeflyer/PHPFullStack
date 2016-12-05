<?php
class test{
	public $name = "zhangsan"; //属性的默认值
	public $sex = "男";
	public $age = 20 ;
	function demo(){
		echo "我很爱国";
	}
	function demo1(){
		//$this-> 指向当前对象
		echo "***".$this->name; //默认情况下 name zhangsan,如果对默认值进行覆盖，调用的是覆盖后的结果***
	}
	function demo2($var){
		echo $var;
	}
}
$t = new test();
//调用属性
//echo $t->name ."<br />";
//echo $t->sex . "<br />";
//覆盖默认值
//$t->name = "tom";
//echo $t->name;
$t->name = "jack"; //覆盖默认值
$t->demo1();
$t->demo2("今天天气一般");






