<?php
class Index{
	const NAME="zhangsan";
        const ease = "ease";  // 尽量不要用小写
	function test(){
		echo self::NAME; //调用常量
	}
}
$in = new Index();
$in->test();
