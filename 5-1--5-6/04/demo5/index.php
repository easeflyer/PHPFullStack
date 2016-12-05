<?php

function recursive($pa){
	$handle = opendir($pa);
	while(($file=readdir($handle))!=false){
		  if($file!="." && $file!=".."){
		  		$file = $pa."/".$file;
		  		if(is_dir($file)){
		  			 recursive($file);
		  		}else{
		  			unlink($file);//删除文件
		  		}
		  }
	}
	closedir($handle);
	rmdir($pa);
}

$path = "aa"; //删除aa中所有内容
recursive($path);
/***
 *   aa  删除
 *   	.
 *   	..
 *   	bb.txt     aa/bb.txt  删除
 *     bb			aa/bb     递归调用自身  删除
 *     					   .
 *     					  ..
 *     				     cc.txt   删除
 *     					 cc       aa/bb/cc  删除
 *     									.
 *     									..
 *     									dd.txt  删除
 *     									dd		aa/bb/cc/dd  删除
 *     											
 * 	
 * 
 * 
 * 
 * 
 * 
 */