<?php
//文件上传的操作类
class upload{
	public $arr;
	function __construct($arr){
		$this->arr = $arr;
	}
	//得到图片的扩展名
	function getExtName(){
		$extName = end(explode(".", $this->arr["name"]));
		return $extName; 
	}
	function checkType($extName){
		if($extName!="jpg" && $extName!="gif" && $extName!="png"){
				echo "图片类型不正确，请重新上传";
				exit;
		}
	}
	//判断图片的大小
	function checkSize(){
		if($this->arr["size"]>2000000){
			echo "图片过大，请重新整理后上传";
			exit;
		}
	}
	//实现文件上传的主方法
	function main(){
		$extName = $this->getExtName();
		$this->checkType($extName);
		$this->checkSize();
		//创建上传目录:
		$fileUpload = "upload/";
		if(!is_dir($fileUpload)){
			mkdir($fileUpload);
		}
		$fileDateDir = $fileUpload.date("Ymd")."/";
		if(!is_dir($fileDateDir)){
			mkdir($fileDateDir);
		}
		//重命名文件 ,执行文件上传
		$fileName = $fileDateDir.time().rand(1000,9999).".".$extName;
		move_uploaded_file($this->arr["tmp_name"], $fileName);
		return $fileName;	
	}
}

