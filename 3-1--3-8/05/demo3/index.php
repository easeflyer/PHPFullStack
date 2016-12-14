+<?php
header("content-type:text/html;charset=utf-8");
$arr = array(3, 6, 14, 7, 2, 20, 35); // 0--2 位置上的元素换位

$tmp = $arr[0]; 
$arr[0] = $arr[2];
$arr[2] = $tmp;

print_r($arr);

echo "<br />-----------冒泡排序---------------------<br />";
$brr = array(3, 6, 14, 7, 2, 20, 35);
for ($i = 0; $i < count($brr); $i++) {              //遍历 $brr
    for ($j = $i + 1; $j < count($brr); $j++) {     // 遍历比较
        if ($brr[$i] < $brr[$j]) {                  // 判断 & 换位
            
            $tmps = $brr[$i];
            $brr[$i] = $brr[$j];
            $brr[$j] = $tmps;
        }
    }
}
/*  过程推演：（i,j值及数组变化）
 * $brr = array(3, 6, 14, 7, 2, 20, 35);
 * i=0,j=1
 * $brr = array(6, 3, 14, 7, 2, 20, 35);
 * i=0,j=2
 * $brr = array(14, 3, 6, 7, 2, 20, 35);
 * i=0,j=3
 * $brr = array(14, 3, 6, 7, 2, 20, 35);
 * i=0,j=4
 * $brr = array(14, 3, 6, 7, 2, 20, 35);
 * i=0,j=5
 * $brr = array(20, 3, 6, 7, 2, 14, 35);
 * i=0,j=6
 * $brr = array(35, 3, 6, 7, 2, 14, 20);
 * 
 * i=1,j=2 以此类推
 */



print_r($brr);