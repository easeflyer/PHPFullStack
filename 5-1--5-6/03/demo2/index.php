<?php
$sourcefile = "imgs/1.jpg";
$dstfile = "imgs/1_small.jpg";
$arr = getimagesize($sourcefile);   // 获得图片的尺寸。 数组
print_r($arr);
$scle = 0.5;
$dst_w = ceil($arr[0]*0.5);   // 宽度
$dst_h = ceil($arr[1]*0.5);   // 高度

$dst_img = imagecreatetruecolor($dst_w, $dst_h);
$src_img = imagecreatefromjpeg($sourcefile);
imagecopyresampled($dst_img,$src_img,0,0,0,0,$dst_w,$dst_h,$arr[0],$arr[1]);

imagejpeg($dst_img,$dstfile);
imagedestroy($dst_img);
imagedestroy($src_img);



