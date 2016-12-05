<?php
session_start();
class verify{
	//属性
	private $width;
	private $height;
	private $codesNum; //验证码的位数
	private $checkCode; //验证码上的文字；
	//方法
	function __construct($w,$h,$cn){
		$this->width 			= $w;
		$this->height 		= $h;
		$this->codesNum = $cn;
		$this->checkCode = $this->createCheckCode();
	}
	function createCheckCode(){
		$str = "abcdefghijklmn0123456789"; // echo $str[0]
		$code = "";
		//如何从str 中 随机的抽出 $this->cn 决定
		for($i=0;$i<$this->codesNum;$i++){  //生成验证码中的下标     abcd  
			$char = $str[rand(0,strlen($str)-1)];
			$code = $code.$char;
		}
		$_SESSION["checkCode"] = $code;
		return $code;  //返回验证码中的文字
	}
	function createPix($imgS,$color){
		for($i=0;$i<200;$i++){  //i 槽点个数
			imagesetpixel($imgS, rand(0,150), rand(0,80), $color);
		}
	}
	function createLine($img,$color){
		for($i=0;$i<5;$i++){
			imageline($img,rand(0,150), rand(0,80),rand(0,150), rand(0,80),$color);
		}
	}
	function createImg(){
		header("content-type:image/gif");
		$img = imagecreate($this->width, $this->height );
		$width = imagecolorallocate($img, 255, 255, 255);
		$black = imagecolorallocate($img, 0, 0, 0);
		$red = imagecolorallocate($img, 255, 0, 0); 
		$green = imagecolorallocate($img, 0, 255, 0); 
		$this->createPix($img, $red);
		$this->createLine($img, $green);
		
		//把验证码写入图像中
		imagettftext($img, 30, rand(-5,5), 30, 40, $black, "arial.ttf", $this->checkCode);
		imagegif($img);
		imagedestroy($img);
	}
}
$vf = new verify(150, 80,5); //调用构造 方法
$vf->createImg();









