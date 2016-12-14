<?php
/*
 * 反序列化 就是把序列化后的变量 进行还原
 */
$handle = fopen("a.txt","a+");
$str = fread($handle, filesize("a.txt"));
$arr = unserialize($str);
print_r($arr);