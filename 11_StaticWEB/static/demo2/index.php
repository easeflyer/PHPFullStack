<?php

//执行过程: 参见笔记
/*
 * 开启缓存，默认头信息:
 * 缓存数据 123
 * header("content-type:text/html;charset=utf-8"); 修改头信息
 * 缓存数据aaa
 * */
ob_start(); //开启缓存
echo "123";
header("content-type:text/html;charset=utf-8");
echo "aaaaaa";
echo "<br />--------------------------<br />";
$content = ob_get_contents();
echo "***".$content;

ob_flush();  // 输出内容
//ob_clean(); //清空缓存区