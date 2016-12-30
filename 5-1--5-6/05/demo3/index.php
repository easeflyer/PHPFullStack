<?php
/**
 * 匹配日期
 */

echo "<br />------------------------<br />";
$flag = "/^\d{4}-\d{2}-\d{2}$/";    // $flag = "/^(\d{4})-\d{2}-\d{2}$/";    可以得到年份
$strs = "2012-02-03"; 
if(preg_match($flag,$strs,$brr)){
	print_r($brr);
}



$mode = "/c\.d/";
$str = "abc.def";
$brr = array();

if(preg_match($mode,$str,$brr)){
	print_r($brr);
}