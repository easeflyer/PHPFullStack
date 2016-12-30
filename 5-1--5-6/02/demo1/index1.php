<?php
header("content-type:image/gif");
$width =150;
$height = 60;
$img = imagecreatetruecolor($width, $height);  //创建真色彩的图像
$white = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));

//imagestring($img, 5, 50, 30, "abcde", $white);  //向图像中写入内容
$angle = rand(-5,5);
$num = rand(10000,99999);
//$num = "1234";
imagettftext($img, 20, $angle, 30, 40, $white, "simpo.ttf", $num);
imagegif($img); //输出到页面
imagedestroy($img); //销毁内存资源