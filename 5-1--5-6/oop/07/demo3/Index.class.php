<?php
class Index{
        const NAME="zhangsan";
        const ease = "ease";  // 尽量不要用小写
        static $age = "33";
	function test(){
                //self::NAME = "lisi";  // 修改常量不被允许。 但静态属性 可以被修改。
		echo self::NAME; //调用常量
	}
}
//define($name, $value);
$in = new Index();
$in->test();

echo "<hr />";

echo Index::NAME;
//Index::NAME = "lisi"; // 这是错误的。
echo Index::$age;
Index::$age = 22;
echo Index::$age;   // 这是可以的