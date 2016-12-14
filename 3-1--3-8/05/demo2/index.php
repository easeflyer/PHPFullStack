<?php
echo "<br />-----------arrayFun------------------<br />";
$file = "a.class.php";
$extArr = explode(".",$file);  // 用 点 分隔 $file
//print_r($extArr); 返回数组
echo $extArr[2];
echo "<br />-----------join------------------<br />";
$arr = array(123,"zhangsan",18,"man");
$str = join("#",$arr);  // 返回字符串
echo $str;
echo "<br />-----------array_values------------------<br />";
$brr =  array("one"=>"zhangsan","two"=>"lisi","th"=>"wangwu");
$txt = array_values($brr);
print_r($txt);
echo "<br />";
$kName = array_keys($brr);
print_r($kName);

echo "<br />-----------array_pop------------------<br />";
$crr =  array("one"=>"zhangsan","two"=>"lisi","th"=>"wangwu");
$str1 = array_pop($crr);
//echo $str1;
print_r($crr);
echo "<br />-----------list------------------<br />";
$drr =  array("zhangsan","lisi","wangwu");
list($name1,,$name3) =$drr;   // 把数组值 赋值给对应的变量
echo $name3;

echo "<br />-----------next prev end------------------<br />";
$err =  array("zhangsan","lisi","wangwu");
echo next($err)."<br />";
echo prev($err)."<br />";
echo end($err)."<br />";
echo prev($err)."<br />";
echo "<br />-----------in_array-----------------<br />";
$frr =  array("zhangsan","lisi","wangwu","xiaoming","xiaozhang");
if(in_array("lisi",$frr)){
	echo "ok";
}else{
	echo "no";
}
echo "<br />-----------array_reverse-----------------<br />";

$grr =  array("zhangsan","lisi","wangwu","xiaoming","xiaozhang");
$hrr = array_reverse($grr);
print_r($hrr);
