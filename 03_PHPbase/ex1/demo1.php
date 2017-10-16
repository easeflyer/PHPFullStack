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
echo "<br />------------------冒泡排序-------------------------------<br />";
echo "<br />";
$brr = array(49,17,52,22,9,36);
$tmp = 0;
for($m = 1; $m < count($brr);$m++){              //一共要比较几次
    for($n = 0; $n < (count($brr)-$m);$n++){       //比较一次要比较几个数
        if($brr[$n]>$brr[$n+1]){                  //如果第一个数比第二个数大
            $tmp = $brr[$n];                   //则交换两个数的位置
            $brr[$n] = $brr[$n+1];
            $brr[$n+1] = $tmp;
        }
        //echo ($arr[$j])."<br />";
    }
}
print_r($brr);
echo "<br />";

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
    }
}
print_r($frr);

/**
 * 回调函数的例子。
 */

function fun1($a,$b){
    echo "我喜欢吃“".$a."”和“".$b."”<br />";
}
function fun2($a,$b){
    echo "我的爱好是“".$a."”和“".$b."”<br />";
}

function fun($f,$a,$b){
    $f($a,$b);
    //fun2($a,$b)
}

$str = "食物";

if($str=="食物"){
    fun("fun1","水果","冰激凌");
}else{
    fun("fun2","读书","上网");
}
