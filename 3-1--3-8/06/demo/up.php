<?php
header("content-type:text/html;charset=utf-8");
$uName = $_POST["uName"];
echo $uName."<br />";
$uImg = $_FILES["uImg"];
print_r($uImg);
echo "<br />------------------------<br />";
//检测文件的类型： jpg png gif .....
$ext = explode(".",$uImg["name"]);
$extName = end($ext);
if($extName!="jpg" && $extName!="gif" && $extName!="png"){
	echo "文件类型不对<a href='index.php'>返回</a>";
	exit; //终止后边的程序运行。
}
//检测文件的大小   1k = 1000字节   1M=1000k     1M = 1000000字节 图片2M 
if($uImg["size"]>2000000){
	echo "文件太大了<a href='index.php'>返回</a>";
	exit; //终止后边的程序运行
} 
//重命名:  upload   ,文件名称 要求 不可重复   时间戳.5位的随机数
$dir = "upload/";
$fileName = time().rand(10000,99999).".".$extName;
$uploadUrl = $dir.$fileName;
move_uploaded_file($uImg["tmp_name"], $uploadUrl);
