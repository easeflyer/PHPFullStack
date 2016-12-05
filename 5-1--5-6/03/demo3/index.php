<?php
$size = 20;
$angle = 0;
$fontfile = "simpo.ttf";
$text = "www.baidu.com";
$filename = "imgs/1.jpg";
$img = imagecreatefromjpeg($filename);
$white = imagecolorallocate($img, 255, 255, 255);
$arr = imagettfbbox($size,$angle,$fontfile,$text);
print_r($arr);
//文本的宽度 和 高度
$width = $arr[2]-$arr[6];
$height = abs($arr[7]-$arr[3]);

$x = 450;
$y = 550;
imagettftext($img, $size, $angle, $x, $y, $white, $fontfile, $text);
imagejpeg($img,"imgs/1_water.jpg");
imagedestroy($img);
