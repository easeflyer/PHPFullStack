<?php
header("content-type:text/html;charset=utf-8");
class Hero{  //类名称 与 文件名称相同
	//属性定义
	public $userName; //public 表示每一个英雄个体，都有名字
	public $userSex ; 
	public $userAge = 18;	// 可以定义一个初始值
	//方法定义：
	function dazhang(){
		echo "在打仗";
                echo $this->userAge;
	}
	function eat($f){  // 方法可以有参数，也可以有返回值
		echo "在吃饭，吃$f";
	}
}

$zhangfei  = new Hero(); // 实例化英雄类
$zhangfei->dazhang();
$zhangfei->eat("米饭");
print_r($zhangfei);













