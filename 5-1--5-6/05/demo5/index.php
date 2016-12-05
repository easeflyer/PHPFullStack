<?php
echo "<br />----------i---------------<br />";
$str = "abcdefgT";
$mode = "/t/i";
if(preg_match($mode,$str,$arr)){
	echo "ok";
}
echo "<br />----------m---------------<br />";
$str1 = "aaaaaa\nbbbbb\ncccc\ndddd";
$mode1 = "/^bbbb/m";
if(preg_match($mode1,$str1,$arr1)){
	echo "ok";
}
echo "<br />----------x---------------<br />";
$str2 = "44444000003333332221111";
$mode2 = "/333 333/x";
if(preg_match($mode2,$str2,$arr2)){
	echo "ok";
}

echo "<br />----------A---------------<br />";
$str3 = "000\n4444333222";
$mode3 = "/4444/A";
if(preg_match($mode3,$str3,$arr3)){
	echo "ok";
}
//000
//4444333222

echo "<br />----------preg_replace---------------<br />";
$str = "12121213abc34424214";
$mode = "/[a-z]/";
echo preg_replace($mode, "***", $str);





