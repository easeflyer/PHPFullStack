<?php
$fileName = "a.txt";
$handle = fopen($fileName,"a+");    // 读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
//$str = fread($handle, 6);
$num = filesize($fileName);         // 获得文件大小
$str = fread($handle, $num);        // 读出文件内容
echo $str;
fclose($handle);