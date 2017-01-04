<?php
class single{
	public static $_instance;
	private function __construct(){}
	function demo(){
		echo "aaaa";
	}
	public static function getInstance(){  //得到本类的对象。
		//该方法中创建一个本类的对象，放到$_instance属性中
		//$_instance属性是静态的--》数据段中 被所有对象共享的。
		if(self::$_instance==NULL){  
			//静态成员是属于类的，第一次创建静态成员的时，需要检测静态成员 是由有值			
			self::$_instance = new single(); // 创建本类对象，赋值到一个静态属性
		}
		return self::$_instance ;
	}
}
$s = single::getInstance();
$s1 = single::getInstance();







