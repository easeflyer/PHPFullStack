<?php
class ImageAction extends Action {
	function thumb(){
		import('ORG.Util.Image');
		Image::thumb("./testimage/big.jpg",'./testimage/thumb_350_350_big.jpg','jpg',350,350);
		Image::thumb("./testimage/big.jpg",'./testimage/thumb_64_64_big.jpg','jpg',64,64);
	}
	function thumb1(){
		import('ORG.Util.Image.ThinkImage');
		$img = new ThinkImage(THINKIMAGE_GD, './testimage/big.jpg'); 
		$img=$img->thumb(100,64,2);
		$img->save('./testimage/100_64.jpg','jpg');
	}
}
?>