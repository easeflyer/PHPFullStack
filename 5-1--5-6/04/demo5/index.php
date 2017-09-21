<?php

/**
 *  递归删除目录
 */
function recursive($pa) {
    $handle = opendir($pa);      // 打开文件夹	
    
    
    while (($file = readdir($handle)) != false) {  // 循环读取文件夹下的所有文件
        if ($file != "." && $file != "..") {   // 排除 . 和 ..
            $file = $pa . "/" . $file;    // 拼接出 文件的完整路径  aa/a/b/index 2.php
            if (is_dir($file)) {     // 如果是一个目录，则递归处理
                recursive($file);
            } else {
                unlink($file);    // 否则 是文件则删除文件
                echo "$file 已经删除成功!<br />";
            }
        }
    }  // 循环的作用：删除文件，以及递归处理目录（删除目录）
    
    
    closedir($handle);
    rmdir($pa);    // 目录不用一个一个删除。只要文件为空，目录可以一起删除。
    echo $pa . '&lt;dir&gt; 已经删除成功!<br />';
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