<?php
header("content-type:image/gif");
session_start();
$width=60;
$height=30;
$image = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
$co = imagecolorallocate($image, rand(0,255),  rand(0,255),  rand(0,255));
imagefilledrectangle($image, 0, 0, 150, 60, $white);
//写字
$str = "0123456789abcdefghijklmn"; //数组
for($i=0;$i<5;$i++){ //$i 表示验证码的位数
	$checkString  = $checkString.$str[rand(0,23)];
}
//验证码生成时候，同时写入session
$_SESSION["cs"] = $checkString;

imagettftext($image, 14, rand(-5,5), 5,20, $co, "simpo.ttf", $checkString);
//绘制糙点
for($i=0;$i<=100;$i++){
	imagesetpixel($image, rand(0,150), rand(0,60), $co);
}
//绘制干扰线
for($i=0;$i<5;$i++){
	imageline($image, rand(0,150), rand(0,60), rand(0,150), rand(0,60), $co);
}
imagegif($image);
imagedestroy($image);