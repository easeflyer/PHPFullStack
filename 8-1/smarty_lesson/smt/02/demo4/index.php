<?php

session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter = "}>";

$str = "abcdefghijk";
$st->assign("str", $str);

//定义修饰符
function fun12($var) {
    return strtoupper($var);
}

function fun13($var) {
    return strtoupper($var);
}

function fun14($var) {
    return strtoupper($var);
}
$st->registerPlugin("modifier", "fun1", "fun13");

// 自定义单标记:fun2参数$arr数组：在标记中所有属性构成的数组
// 也可以说 在这里定义了 $arr 则标记中就可以使用对应的数组下标的属性。注意逻辑关系。
// 比如这里的：size , color, content 都可以用于 标记的属性
// <{demo size="30" color="red" content="我很爱国"}> demo标签 就变成了一个 div

function fun2($arr) {
    $html = "<div style='font-size:" . $arr["size"] . "px;color:" . $arr["color"] . "'>" . $arr["content"] . "</div>";
    return $html;
}

$st->registerPlugin("function", "demo", "fun2");

//定义双标记 注意两个参数的使用
// $arr 仍然是 标记的属性数组，参考但标记
// $con 是双标记之间的 content 内容
// 比如 <{test color="red"}>你也很爱国<{/test}>  你也很爱国 文字最终会赋值给 $con
// 注意双标记的 回调函数 func31 会被调用两次。 第一次是处理 开始标记时，这时$con 没有值。
//     第二次是 处理结束标记时，这时$con 有值。 第一次调用时 $repeat 的值为 true 第二次调用时 为 false

function fun31($arr, $con, $smarty, &$repeat) {
    //$html = "<div style='color:".$arr["color"]."'>".$con."</div>";
    //$html = "";
    if($repeat){
        $html = "标签开始渲染这个内容。";
    }else{
        $html = "<div>" . $con . "</div>";
    }
    return $html;
}

$st->registerPlugin("block", "test12", "fun31");

$st->display("index.html");
