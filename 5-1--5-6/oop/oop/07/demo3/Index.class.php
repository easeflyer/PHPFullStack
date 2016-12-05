<?php
class Index{
	const NAME="zhangsan";
	function test(){
		echo self::NAME; //调用常量
	}
}
$in = new Index();
$in->test();
