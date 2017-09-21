<?php
$dirs = opendir("test/"); // opendir() 打开目录
$file1 = readdir($dirs);  // .
echo $file1."<br />";
$file2 = readdir($dirs);  // ..
echo $file2."<br />";
$file3 = readdir($dirs);  // b.php
echo $file3."<br />";
$file4 = readdir($dirs);  // test1
echo $file4."(末尾)<br />";
closedir($dirs);


echo "<hr />";
$dirs = opendir("test/");
while($file = readdir($dirs)){
    echo $file."<br />";
}