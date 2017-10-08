<?php
$path = "c.html";  // 准备创建的文件，并写入 test.html
$str = file_get_contents('test.html'); //把test.html页面读取出来。
echo $str;
file_put_contents($path, $str); //可以创建 并且写入内容
//网站静态化的。