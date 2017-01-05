<?php
header("content-type:image/gif");
$width =150;
$height = 60;
$img = imagecreatetruecolor($width, $height);  //创建真色彩的图像
/**
 *       imagecolorallocate() 为图像分配颜色的。
        格式: int imagecolorallocate(resource $img,int red,int green int blue);   0-255x`x`
 */
$white = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));  //image color allocate  创建一个随机颜色

//imagestring($img, 5, 50, 30, "abcde", $white);  //向图像中写入内容
$angle = rand(-5,5);
$num = rand(10000,99999);
imagettftext($img, 20, $angle, 30, 40, $white, "simpo.ttf", $num);  // $angle 倾斜角度 参考 笔记
imagegif($img); //输出到页面 gif 图像
imagedestroy($img); //销毁内存资源 销毁图像

