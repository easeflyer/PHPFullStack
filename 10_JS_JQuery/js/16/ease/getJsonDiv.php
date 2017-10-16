<?php
// 这个接口的功能
// 这个接口 发送的数据类型和格式 json

header("Access-Control-Allow-Origin: *");   // 解决跨域访问问题。
$arr1 = Array(
    "tag"   => "div",
    "style"  => "width:200px;height:200px;border: 1px solid #ff0000;background:#ccffff",
    "text"  => "我是 arr1"
);

$arr2 = Array(
    "tag"   => "div",
    "style"  => "width:300px;height:200px;border: 1px solid #00ff00;background:#ffccff",
    "text"  => "我是 arr2"
);

$arr3 = Array(
    "tag"   => "div",
    "style"  => "width:400px;height:200px;border: 1px solid #0000ff;background:#ffffcc",
    "text"  => "我是 arr3"
);

//print_r($_POST);exit;

if ($_GET)  $re = $_GET;
if ($_POST)  $re = $_POST;

if($re){

    //print_r($_POST);
    if($re['style']==1){
        echo json_encode($arr1);
    }
    if($re['style']==2){ 
        echo json_encode($arr2);
    }
    if($re['style']==3){ 
        echo json_encode($arr3);
    }
}