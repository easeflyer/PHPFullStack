<?php
$fileName = "a.txt";
$handle = fopen($fileName,"w+");  //创建  并且 打开
fwrite($handle,"abcdefghijklmn");
fclose($handle);