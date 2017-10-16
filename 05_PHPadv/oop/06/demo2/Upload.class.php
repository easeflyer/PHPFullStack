<?php

//截取图像的扩展名
//判断图像的大小
//判断文件的类型
//为文件重命名
//上传图片  move_uploaded_file();

class Upload {

    public $arr;

    function __construct($arrImg) {
        $this->arr = $arrImg;
    }

    //得到扩展名
    function getExtName() {
        //直接拿到 文件名称 $this->arr["name"];  1.jpg     demo.test.jpg
        $extName = end(explode(".", $this->arr["name"]));
        return $extName;
    }

    //检查图像大小
    function checkSize() {
        if ($this->arr["size"] > 2000000) {
            echo "图像太大了，请调整后上传";
            exit;
        }
    }

    //检查图像类型  jpg  gif  png 
    function checkType($extName) {
        if ($extName != "jpg" && $extName != "gif" && $extName != "png") {
            echo "图像类型不正确,请调整后上传";
            exit;
        }
    }

    //为文件重命名:  //   upload/日期/文件名称
    function getFileName() {
        $filePathOne = "upload/";  //is_dir(); //判断当前路径是否是目录。
        //echo is_dir($filePathOne);  是目录 返回true   不是目录返回false
        if (is_dir($filePathOne)) {
            
        } else {
            mkdir($filePathOne);
        }
        $filePathTwo = $filePathOne . date("Ymd") . "/";
        if (is_dir($filePathTwo)) {
            
        } else {
            mkdir($filePathTwo);
        }
        $fileName = $filePathTwo . date("Ymd") . rand(1000, 9999) . "." . $this->getExtName();
        return $fileName;
    }

    //文件上传主调放法
    function main() {  //所有的文件上传相关的内容都集成到该方法内部。
        $extN = $this->getExtName(); //获得扩展名
        $this->checkSize();  //检测文件大小
        $this->checkType($extN); //检测文件类型;
        $fileName = $this->getFileName();
        if (move_uploaded_file($this->arr["tmp_name"], $fileName))
        //路径 --》放入到数据库.
            return $fileName;
        else
            return false;
    }

}


$upImg = $_FILES["upImg"]; //接受图像数组。
$up = new Upload($upImg);  //把图像数组 传递到类中.
if( $fileName = $up->main() ) echo "文件成功上传到：".$fileName;
else echo "文件上传失败！";
$userName = $_POST["userName"];
$sql = "insert into users(userName,userImg) values('{$userName}'),'{$fileName}')";
// 插入数据库。