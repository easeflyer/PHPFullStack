<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$arr = array(49,17,52,22,9,36);
$temp = 0;
for($i = 0; $i < count($arr);$i++){              //元素的个数
    for($j = $i+1; $j < count($arr);$j++){       //循环次数
        if($arr[$i]>$arr[$j]){                  //如果第一个数比第二个数大
            $temp = $arr[$i];                   //则交换两个数的位置
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
        //echo ($arr[$j])."<br />";
    }
}
print_r($arr);
echo "<br />";
echo "<br />------------------冒泡排序---正序--冒大泡-------------------<br />";
echo "<br />";
$brr = array(49,17,52,22,9,36);
$tmp = 0;
for($m = 1; $m < count($brr);$m++){            

    for($n = 0; $n < (count($brr)-$m);$n++){   //比较一次要比较几个数。每轮都是从第一个数开始往后比较。直到不需要比较的书为止

        if($brr[$n]>$brr[$n+1]){               //如果第一个数比第二个数大

            $tmp = $brr[$n];                   //则交换两个数的位置
            $brr[$n] = $brr[$n+1];
            $brr[$n+1] = $tmp;
        }
        //echo ($arr[$j])."<br />";
    }
}
print_r($brr);
echo "<br />";




/* 

原理：从第一个数开始 往后依次比较。大数往后放，或者小数往后放。比较到最后一个数后。排在最后面的数，就是最大数，或者最小数。

    再从第一个数开始 依次往后比较，交换方法同上，比较到倒数第二个数为止。 

推演过程：

开始：$brr = array(49,17,52,22,9,36);
$m=1,$m<6   $n=0,$n<5
17，49，52，22，9，26
$m=1,$m<6   $n=1,$n<5
17，49，52，22，9，26
$m=1,$m<6   $n=2,$n<5
17，49，22，52，9，26
$m=1,$m<6   $n=3,$n<5
17，49，22，9，52，26
$m=1,$m<6   $n=4,$n<5
17,49,22,9,26,52


$m=2,$m<6   $n=0,$n<4
17,49,22,9,26,52
$m=2,$m<6   $n=1,$n<4
17,22,49,9,26,52
$m=2,$m<6   $n=2,$n<4
17,22,9,49,26,52
$m=2,$m<6   $n=3,$n<4
17,22,9,26,49,52

*/


echo "<br />-----------------冒泡排序2 ----------------------<br />";
echo "<br />";
$brr = array(49,17,52,22,9,36);
$tmp = 0;
for($m = 1; $m < count($brr);$m++){              //一共要比较几次
    for($n = $m+1; $n < count($brr);$n++){       //比较一次要比较几个数
        if($brr[$n]>$brr[$m]){                  //如果第一个数比第二个数大
            $tmp = $brr[$n];                   //则交换两个数的位置
            $brr[$n] = $brr[$m];
            $brr[$m] = $tmp;
        }
        //echo ($arr[$j])."<br />";
    }
}
print_r($brr);
echo "<br />";


echo "<br />-----------------------选择排序-----------------------------------<br />";
echo "<br />";
$frr=array(12,6,50,23,38,75);
$tm=0;

for($a=0;$a < count($frr);$a++){    //一共要比较几次

    $minval = $frr[$a];        //假设第一个数为最小数
    $minindex = $a;            //记录最小数的下标

    for($b = $a+1;$b < count($frr);$b++){    //比较一次要比较几个数

        if($minval > $frr[$b]){       //如果最小数比后边一个数大
            $minval = $frr[$b];       //将后边一个数假设成最小数
            $minindex = $b;           //记录最小数的下标
            $tm = $frr[$a];          // 将前边一个数与最小数交换位置
            $frr[$a] = $frr[$minindex];
            $frr[$minindex] = $tm;
        }
        foreach ($frr as $v) {
            echo $v.",";
        }
        echo "<br />"
    }
}
print_r($frr);
