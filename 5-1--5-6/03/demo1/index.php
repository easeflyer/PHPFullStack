<?php
$sourceFile = "imgs/1.jpg"; //旧图
$dstFile = "imgs/1_small.jpg"; //新图
//旧图的宽高
$src_width = "744";
$src_height = "594";
//缩放比例系数
$scle = 0.5;
//新图的宽高
$dst_width = ceil($src_width*$scle);
$dst_height = ceil($src_height*$scle);

//创建新图:
$dst_img = imagecreatetruecolor($dst_width, $dst_height);
//载入旧图
$src_img = imagecreatefromjpeg($sourceFile);
//等比缩放：
imagecopyresampled($dst_img,$src_img,0,0,0,0,$dst_width,$dst_height,$src_width,$src_height);

//输出图像
imagejpeg($dst_img,$dstFile);
imagedestroy($dst_img);
imagedestroy($src_img);














