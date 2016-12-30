<?php
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