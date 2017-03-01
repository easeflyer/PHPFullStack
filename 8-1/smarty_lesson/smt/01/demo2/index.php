<?php
header("content-type:text/html;charset=utf-8");
require("libs/Smarty.class.php");
$st = new Smarty();



$str = "我很爱国";
$st->assign("demo",$str);

$num = 123;
$st->assign("num",$num);

$fl = 3.14;
$st->assign("fl",$fl);
$bl = true;
$st->assign("bl",$bl);

$arr = array("张三 ","lisi","tom","wangwu"); //$arr[0]
$st->assign("arr",$arr);

$brr = array("one"=>"zhangsan","two"=>"caoxueqing","three"=>"xiaozhang");
$st->assign("brr",$brr);


class testOne{
	public $test = "今天天气不错";
	function demo(){
		echo "我很爱国";
	}
}
$to = new testOne();
$st->assign("to",$to);


$st->display("index.html");