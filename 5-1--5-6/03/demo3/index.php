<?php
$size = 20;
$angle = 0;
$fontfile = "yahei.ttf";
$text = "我赢职场";
$filename = "imgs/1.jpg";
$img = imagecreatefromjpeg($filename);
$white = imagecolorallocate($img, 255, 255, 255);  // 为图像分配颜色


$arr = imagettfbbox($size,$angle,$fontfile,$text);
print_r($arr);
//文本的宽度 和 高度
$width = $arr[2]-$arr[6];  // 文本的宽度
$height = abs($arr[7]-$arr[3]);  // 文本的高度



$x = 450;
$y = 550;
imagettftext($img, $size, $angle, $x, $y, $white, $fontfile, $text);
imagejpeg($img,"imgs/1_water.jpg");
imagedestroy($img);
