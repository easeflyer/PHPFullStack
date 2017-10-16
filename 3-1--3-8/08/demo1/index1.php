<?php
$fileName = "a.txt";
$handle = fopen($fileName,"a+");    // 读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
// 当文件开始读取时，指针在文件开头。写入的时候，从末尾写入，并且指针留在文件末尾。
// http://www.cnblogs.com/operaculus/p/5680850.html
//$str = fread($handle, 6);
$num = filesize($fileName);         // 获得文件大小
echo "filesize:".$num."<br />";
$str = fread($handle, $num);        // 读出文件内容，从文件头开始。注意文件指针的问题。
echo "content:".$str;
fclose($handle);