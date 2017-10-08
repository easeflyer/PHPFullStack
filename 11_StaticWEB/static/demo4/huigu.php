<?php

//file_get_contents("url") 根据url 得到 url 页面的所有内容
$str = file_get_contents("http://www.baidu.com/index.php"); //字符串  读url
echo "<br />------------------------------------------<br />";
echo $str;
echo "<br />------------------------------------------<br />";
//file_put_contents("url"，$str);
$filePath = "bendibaidu.html";
file_put_contents($filePath, $str);  // 写入文件 参见文件读写章节
