<?php

session_start();
include("libs/Smarty.class.php");
$st = new Smarty();
$st->left_delimiter = "<{";
$st->right_delimiter = "}>";


//开启缓存
$st->setCaching(Smarty::CACHING_LIFETIME_CURRENT);  // 常量： 根据 lifetime 判断缓存过期
//指定缓存的生命期:秒为单位 300秒 = 5分钟
$st->setCacheLifetime(300);  // 5秒后刷新缓存
//禁止 重新生成缓存文件  true 如果有修改 马上重新生成。不等缓存过期，设置成 false 则到期后才会重新生成，性能会更好些。
$st->setCompileCheck(false);
//检测文件是否缓存过，如果缓存过 ，就不在缓存
$msg = "这个内容不会被获取"; // 因为只要 index.html没有被缓存 $msg 就会被重新赋值。而如果已经缓存过了。则 display 只会得到 缓存的结果。
if (!$st->isCached("index.html")) {
    $msg = time();  // 如果没有缓存，就重新赋值给 $msg
}
//$msg = time();
$st->assign("msg",$msg);
$st->display("index.html");