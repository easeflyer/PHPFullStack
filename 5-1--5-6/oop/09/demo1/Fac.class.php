<?php
interface user{
	function getName();
}
class  user1 implements user{
	function getName(){
		return "zhangsan";
	}
}
/*
 * $u = new user1();
class  user2 implements user{
	function getName(){
		return "lisi";
	}
}
*/
class Fac{ //创建对象的。
	//静态成员 类外调用 Fac::createObj();
	public static function createObj($num){
		return new user1();
		/*
		 * if($num==1){
		 * 	return new user1();
		 * }else if($num==2){
		 * 	return new user2();
		 * }
		 * 
		 * */
	}
}
$u1 = Fac::createObj(1);  //$u1 是user1 的对象。*****
echo $u1->getName();






















