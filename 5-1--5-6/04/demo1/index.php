<?php
$path = "text/";
//file_exists($filename);存在 true 不存在 false
//file_exists($filename) -->!false ==> true
if(!file_exists($path)){  
	//存在不执行  不存在才执行
	mkdir($path);
}else{
	echo "已存在";
}