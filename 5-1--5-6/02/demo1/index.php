<?php
header("content-type:image/gif");
$width =50;
$height = 60;
$img = imagecreatetruecolor($width, $height);  //创建真色彩的图像 这里还没有确定文件类型
imagegif($img); //输出到页面
imagedestroy($img); //销毁内存资源