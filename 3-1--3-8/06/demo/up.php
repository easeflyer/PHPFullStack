<?php
/**
 *  文件上传流程：
 *  1 form标签必须设置   enctype="multipart/form-data" 指定的编码方式。
 *  2 $_FILES[" 文件表单元素name"] 接收上传文件的信息。
 *  3 move_uploaded_file(临时位置,指定的位置) 把文件保存到合适的位置。
 */


header("content-type:text/html;charset=utf-8");

$uName = $_POST["uName"];   // 用户名 字段
echo $uName."<br />";
$uImg = $_FILES["uImg1"];    // 查看下 $_FILES[] 的组成。
print_r($uImg);


echo "<br />------------------------<br />";

//检测文件的类型： jpg png gif .....
$ext = explode(".",$uImg["name"]);
$extName = end($ext);  // 获得数组最后一个元素 见end 函数。
if($extName!="jpg" && $extName!="gif" && $extName!="png"){
	echo "文件类型不对<a href='index.php'>返回</a>";
	exit; //终止后边的程序运行。
}


//检测文件的大小   1k = 1000字节   1M=1000k     1M = 1000000字节 图片2M  字节为单位
if($uImg["size"]>2000000){
	echo "文件太大了<a href='index.php'>返回</a>";
	exit; //终止后边的程序运行
}
//重命名:  upload   ,   文件名称 要求 不可重复   时间戳.5位的随机数
$dir = "upload/";

$fileName = time().rand(10000,99999).".".$extName;
$uploadUrl = $dir.$fileName;
move_uploaded_file($uImg["tmp_name"], $uploadUrl); // 把文件从临时位置，保存到合适的位置。
















