<?php
header("content-type:image/gif");
$width=150;
$height=60;
$image = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($image, 5, 255, 255);
$co = imagecolorallocate($image, rand(0,255),  rand(0,255),  rand(0,255));
imagefilledrectangle($image, 0, 0, 150, 60, $white);
//写字
$str = "0123456789abcdefghijklmn"; //数组
$checkString = "";
for($i=0;$i<5;$i++){ //$i 表示验证码的位数
	$checkString  = $checkString.$str[rand(0,23)];
}
imagettftext($image, 25, rand(-5,5), 20,30, $co, "simpo.ttf", $checkString);


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