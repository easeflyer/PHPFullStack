<?php
header("content-type:text/html;charset=utf-8");
echo "<br />---------索引数组 直接定义-------------------<br />";
$arr[0] = 123;
$arr[1] = "zhangsan";
$arr[2] = "man";
$arr[3] = "china";
$arr[4] = 18;
//echo $arr[2];
//print_r($arr);//下标=》值
echo count($arr);
echo "<br />";
echo "<br />---------索引数组 用array关键词定义-------------------<br />";
$brr = array(123,"zhangsan","man","china");
//print_r($brr);
echo $brr[1];

echo "<br />--------关联数组 直接定义-------------------<br />";
$crr["one"] = "中国";
$crr["demo"] = "美国";
$crr["test"] = "法国";
$crr["un"] = "英国";
//echo $crr["test"];
print_r($crr);


echo "<br />---------关联数组 用array关键词定义-------------------<br />";

$drr = array("one"=>"中国","demo"=>"美国","test"=>"法国","un"=>"英国");
//print_r($drr);
echo $drr["demo"];

echo "<br />---------索引数组下标不连续-------------------<br />";
$err[0] = "aaaa";
$err[5]="bbbbb";
$err[1]="cccccc";
//print_r($err);
echo count($err);

echo "<br />---------二维数组 ------------------<br />";
$frr = array(
								array("zhangsan",18,"man"),
								array("lisi",15,"man"),
								array("wangwu",16,"woman"),
								array("zhaoliu",17,"sex"=>"woman"),
						);
echo $frr[3]["sex"];


echo "<br />---------索引数组的遍历 ------------------<br />";
$hrr = array("zhangsan","lisi","wangwu","zhaoliu");
foreach($hrr as $key=>$val){
	echo $key."-->".$val."-->".$hrr[$key]."<br />";
}
echo "<br />---------关联数组的遍历 ------------------<br />";
$yrr = array("one"=>"zhangsan","two"=>"lisi","txt"=>"xiaoming","demo"=>"xiaozhang");
foreach($yrr as $k=>$v){
	echo $k."--》".$v."-->".$yrr[$k]."<br />";
}




















