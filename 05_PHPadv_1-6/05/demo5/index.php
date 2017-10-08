<?php
/**
 * 
 */

echo "<br />----------i--不区分大小写-------------<br />";  
$str = "abcdefgT";
$mode = "/t/i";
if(preg_match($mode,$str,$arr)){
	echo "ok";
}
echo "<br />----------m---------------<br />";
$str1 = "aaaaaa\nbbbbb\ncccc\ndddd";    // \n 多行文本   增加 m 修正符 可以正确匹配，否则默认 $str1 只识别单行文本
$mode1 = "/^bbbb/m";
if(preg_match($mode1,$str1,$arr1)){
	echo "ok";
}
echo "<br />----------x---------------<br />";
$str2 = "44444000003333332221111";
$mode2 = "/333 333/x";                   // 增加 x 修正符 模式中的 空白 被忽略
if(preg_match($mode2,$str2,$arr2)){
	echo "ok";
}

echo "<br />----------A---------------<br />";
$str3 = "000\n4444333222";   // A 仅仅从开头搜索 如果开头由 4444 则成功，否则不成功
$mode3 = "/4444/A";
if(preg_match($mode3,$str3,$arr3)){
	echo "ok";
}
//000
//4444333222

echo "<br />----------preg_replace---------------<br />";
$str = "12121213abc34424214";
$mode = "/[a-z]/";          // 注意这是一个字符。
echo preg_replace($mode, "***", $str); // 每个字符被 *** 替换，因此结果又 9个 星号





