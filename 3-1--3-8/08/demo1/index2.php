<?php
/* 写入文件案例 2 */

$handle = fopen("a.html","a+");                 // 读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
$str = "<div style='color:#ff0000'>zhangsan</div>";
fwrite($handle, $str);
fclose($handle);