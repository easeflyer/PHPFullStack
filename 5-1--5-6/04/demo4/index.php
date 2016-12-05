<?php
$dirs = opendir("test/");
$file1 = readdir($dirs);
echo $file1."<br />";
$file2 = readdir($dirs);
echo $file2."<br />";
$file3 = readdir($dirs);
echo $file3."<br />";
$file4 = readdir($dirs);
echo $file4."<br />";
closedir($dirs);