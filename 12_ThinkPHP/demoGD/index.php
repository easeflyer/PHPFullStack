<?php
ob_clean();

header("content-type:image/gif");
$width=150;
$height=60;
$image=imagecreatetruecolor($width,$height);



$white=imagecolorallocate($image,255,255,255);  //int imagecolorallocate ( resource $image , int $red , int $green , int $blue ) 为一幅图像分配颜色
$co=imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
imagefilledrectangle($image,0,0,150,60,$white); //bool imagefilledrectangle ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color ) 画一矩形并填充
$str="123456789abcdefhhijklmnopqratuvwsyz";

$checkString = "";

for($i=0;$i<5;$i++){
	$checkString = $checkString.$str[rand(0,33)];
}


// 用 TrueType 字体向图像写入文本
//array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
// 注意路径问题
imagettftext($image,25,rand(-5,5),20,30,$co,"./ARLRDBD.TTF",$checkString); 

for($i=0;$i<100;$i++){
	imagesetpixel($image,rand(0,150),rand(0,60),$co);   //bool imagesetpixel ( resource $image , int $x , int $y , int $color )   画一个单一像素
}

for($i=0;$i<5;$i++){
	imageline($image,rand(0,150),rand(0,60),rand(0,150),rand(0,60),$co);  //bool imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color ) 一条线段
}





imagegif($image);

magedestroy($image);



?>