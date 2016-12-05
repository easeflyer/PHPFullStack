<?php

//file_get_contents("url") 根据url 得到 url 页面的所有内容
$str = file_get_contents("http://www.baidu.com/index.php?tn=monline_5_dg"); //字符串
echo "<br />------------------------------------------<br />";
echo $str;
echo "<br />------------------------------------------<br />";
//file_put_contents("url"，$str);
$filePath = "bendibaidu.html";
file_put_contents($filePath, $str);
