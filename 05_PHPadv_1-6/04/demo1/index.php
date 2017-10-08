<?php
$path = "text/test";
//file_exists($filename);存在 true 不存在 false
//file_exists($filename) -->!false ==> true
if(!file_exists($path)){    //文件/目录 是否存在
	//存在不执行  不存在才执行
	mkdir($path);
        echo "$path 目录已经创建成功";
}else{
	echo "$path 已存在";
}