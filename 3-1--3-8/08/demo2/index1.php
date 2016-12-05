<?php
$handle = fopen("a.txt","a+");
$str = fread($handle, filesize("a.txt"));
$arr = unserialize($str);
print_r($arr);