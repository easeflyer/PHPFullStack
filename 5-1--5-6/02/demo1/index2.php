<?php
header("content-type:image/gif");
$width =150;
$height = 60;
$img = imagecreatetruecolor($width, $height);  //创建真色彩的图像
$white = imagecolorallocate($img, 255,255,255);
$wColor = imagecolorallocate($img, 255,0,0);
$wColor1 = imagecolorallocate($img, 255,255,255);
imagefilledrectangle($img, 0,0,150,60,$white);
$wColor1=rand(-5,5);
$num = rand(10000,99999);
imagettftext($img, 20, $angle, 20, 40, $wColor, "simpo.ttf", $num);

//绘制糙点
for($i=0;$i<200;$i++){
	imagesetpixel ( $img , rand(0,150) , rand(0,60) , $wColor1 );
}
for($i=0;$i<=5;$i++){
	imageline($img,rand(0,150),rand(0,60),rand(0,150),rand(0,60),$wColor1);
}


imagegif($img); //输出到页面
imagedestroy($img); //销毁内存资源