<?php
echo "<br />------------a-zA-Z0-9----------------<br />";
$mode = "/[a-z]/";
$str = "1111qa-z123afdsafas";
/** preg_match($mode,$str,$arr)
 * $mode  正则表达式
 * $str 被搜索的字符串
 * $arr 匹配结果  如果有子模式，也被保存到这里。
 */
$arr = array(11);
echo preg_match($mode,$str,$arr);  // $arr 是 引用传递的参数，注意看手册 被填充 搜索到的结果数组。
print_r($arr);


echo "<br />------------()----------------<br />";
$mode1 = "/(ab)c\\1/"; //  \转义字符   第二个"\" ==>控制符 "\"  \\1 引用第一个（）元素
$str1 = "abcabfasdfadfasdf";
$re = preg_match($mode1,$str1,$arr1);
echo $re."<br />";
if($re){
	print_r($arr1);    // Array ( [0] => abcab [1] => ab ) 
}
echo "<br />------------[]----------------<br />";
$mode2 = "/[a-zA-Z0-9_]/";  //数字 字母 
$str2 = "_中文";
if(preg_match($mode2,$str2,$arr2)){
	print_r($arr2);
}

echo "<br />------------[^abc]----------------<br />";
$mode3 = "/[^abc]/";  //数字 字母 
$str3 = "abcd";     
if(preg_match($mode3,$str3,$arr3)){
	print_r($arr3);  //Array ( [0] => d ) 
}

echo "<br />------------\d----------------<br />";

$mode4 = "/\d/";  //数字 字母 
$str4 = "a432bcfd32d432";
if(preg_match($mode4,$str4,$arr4)){
	print_r($arr4);
        echo "<br />";
}
if(preg_match_all($mode4,$str4,$arr4)){
	print_r($arr4);
}


echo "<br />------------\w----------------<br />";

$mode5 = "/\w/";  //数字 字母 
$str5 = "*?a432bcfd32d432";
if(preg_match($mode5,$str5,$arr5)){
	print_r($arr5);
}
echo "<br />------------*----------------<br />";
/**
 *  * 匹配结果  mo
 *  + 匹配结果 moo
 *  +? 匹配结果 mo
 * 
 * 默认是贪婪模式，加上 ? 是懒惰模式
 * 
 */

$mode6 = "/moo*/";  //数字 字母    * 0个或者多个
$str6 = "mmoooomo";
if(preg_match($mode6,$str6,$arr6)){
	print_r($arr6);
}

echo "<br />------------*----------------<br />";
$mode7 = "/mo./";  //数字 字母 
$str7 = "mo1start";
if(preg_match($mode7,$str7,$arr7)){
	print_r($arr7);
}
echo "<br />------------.*----------------<br />";
$mode8 = "/mo.*/";  //数字 字母 
$str8 = "moonstartfdsafdsaffdasssadf";
if(preg_match($mode8,$str8,$arr8)){
	print_r($arr8);
}

echo "<br />------------+----------------<br />";
$mode9 = "/mo+nstar/";  //数字 字母 
$str9 = "mnstart";
if(preg_match($mode9,$str9,$arr9)){
	print_r($arr9);
}

echo "<br />------------|----------------<br />";
$flag = "/moon|sun/";  //数字 字母 
$strs = "sun";
if(preg_match($flag,$strs,$brr)){
	print_r($brr);
}

echo "<br />------------^----------------<br />";
$flag1 = "/^moons\wart/";  //数字 字母 
$strs1 = "moonstart"; //普通的字符串  字符串中部分加() [] .*都可以算作开头的内容
if(preg_match($flag1,$strs1,$brr1)){
	print_r($brr1);
}

echo "<br />------------^$----------------<br />";
$flag2 = "/&moon$/";  
$strs2 = "moonstartmoon"; 
if(preg_match($flag2,$strs2,$brr2)){
	print_r($brr2);
}

echo "<br />------------{m,n}----------------<br />";
$flag3 = "/^.{6,18}$/";  
$strs3 = "aaaaaaaaaaaaaaaaaaa"; 
if(preg_match($flag3,$strs3,$brr3)){
	print_r($brr3);
}



echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";