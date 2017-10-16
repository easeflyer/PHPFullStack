<?php
//ob_end_clean(); 关闭缓存，同时清空:
ob_start();
echo "aaaaaaa";
header("content-type:text/html;charset=utf-8");
echo "bbbbbbbb";
echo "<br />---------------<br />";
ob_end_clean(); //关闭缓存之后，缓存中的数据 没有办法 获取到了
echo 4444445;  //关闭缓存后，后边数据不影响。
echo "缓冲：".ob_get_contents();


