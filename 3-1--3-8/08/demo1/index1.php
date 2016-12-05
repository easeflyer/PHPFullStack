<?php
$fileName = "a.txt";
$handle = fopen($fileName,"a+");
//$str = fread($handle, 6);
$num = filesize($fileName);
$str = fread($handle, $num);
echo $str;
fclose($handle);
