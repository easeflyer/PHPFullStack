<?php
echo "<br />------------a-zA-Z0-9----------------<br />";
$mode = "/[a-z]/";
$str = "qa-z123afdsafas";
echo preg_match($mode,$str,$arr);
print_r($arr);
echo "<br />------------()----------------<br />";
$mode1 = "/(ab)c\\1/"; //  \转义字符   第二个"\" ==>控制符 "\"  \\1 引用第一个（）元素
$str1 = "abcab";
if(preg_match($mode1,$str1,$arr1)){
	print_r($arr1);
}
echo "<br />------------[]----------------<br />";
$mode2 = "/[a-zA-Z0-9_]/";  //数字 字母 
$str2 = "_";
if(preg_match($mode2,$str2,$arr2)){
	print_r($arr2);
}

echo "<br />------------[^abc]----------------<br />";
$mode3 = "/[^abc]/";  //数字 字母 
$str3 = "abcd";
if(preg_match($mode3,$str3,$arr3)){
	print_r($arr3);
}

echo "<br />------------\d----------------<br />";

$mode4 = "/\d/";  //数字 字母 
$str4 = "a432bcfd32d432";
if(preg_match($mode4,$str4,$arr4)){
	print_r($arr4);
}


echo "<br />------------\w----------------<br />";

$mode5 = "/\w/";  //数字 字母 
$str5 = "*?a432bcfd32d432";
if(preg_match($mode5,$str5,$arr5)){
	print_r($arr5);
}
echo "<br />------------*----------------<br />";
$mode6 = "/mo*/";  //数字 字母 
$str6 = "mmomo";
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
$strs = "moon";
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
$flag2 = "/^moon$/";  
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



