<?php
$fileName = "a.txt";
$handle = fopen($fileName,"w+");  //创建  并且 打开  $handle 是资源类型变量，可以理解为“文件指针”
$bt = fwrite($handle,"要写入的内容abcdefghijklmn要写入的内容");  // fwrite() 返回写入的字符数，出现错误时则返回 FALSE 。 
fclose($handle);

if($bt) echo "文件写入成功！写入".$bt."字节";
else echo "文件写入失败";