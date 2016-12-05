<?php
header("content-type:text/html;charset=utf-8");
$arr = array(3,6,14,7,2,20,35); // 0--2 位置上的元素换位
$tmp = $arr[0]; //3;
$arr[0] = $arr[2];
$arr[2] = $tmp;
print_r($arr);

echo "<br />-----------冒泡排序---------------------<br />";
$brr = array(3,6,14,7,2,20,35); 
for($i=0;$i<count($brr);$i++){
	for($j=$i+1;$j<count($brr);$j++){
		if($brr[$i]<$brr[$j]){
			$tmps = $brr[$i];
			$brr[$i] = $brr[$j];
			$brr[$j] = $tmps;
		}
	}
}

print_r($brr);



