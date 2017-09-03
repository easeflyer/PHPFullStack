<?php
//ob_end_flush();冲刷出（送出）输出缓冲区内容并关闭缓冲
ob_start();
echo "ccccc";
header("content-type:text/html;charset=utf-8");
echo 123;
ob_end_flush();
echo "<br />-------------------------<br />";
echo ob_get_contents();