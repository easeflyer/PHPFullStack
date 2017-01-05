<?php
$dirs = opendir("test/");
$file1 = readdir($dirs);  // .
echo $file1."<br />";
$file2 = readdir($dirs);  // ..
echo $file2."<br />";
$file3 = readdir($dirs);  // b.php
echo $file3."<br />";
$file4 = readdir($dirs);  // 没有内容。
echo $file4."(末尾)<br />";
closedir($dirs);