<?php
include 'config.php';
$action = $_GET["action"];
if($action=="insert"){
	$ceName = $_POST["ceName"];
	$cdId = $_POST["cdId"];
	$clId = $_POST["clId"];
	$ceEmail = $_POST["ceEmail"];
	$ceTel = $_POST["ceTel"];
	$cePic = $_FILES["cePic"];
	//处理图片
	$cePic = $_FILES["cePic"];
	
	
	$extName = end(explode(".", $cePic["name"]));
	
	/*
	//判断图片类型
	if($extName!="jpg" && $extName!="gif" && $extName!="png"){
		echo "图片类型不正确";
		exit;
	}
	//判断图片大小
	if($cdPic["size"]>2000000){
		echo "ͼƬ̫��";
		exit;
	}
	*/
	//图片大小不正确
	$fileName = "public/upload/".time().rand(1000,9999).".".$extName;
	echo $fileName;
	//执行图片上传
	move_uploaded_file($cePic["tmp_name"], $fileName);
	$sql = "insert into com_emp(ceName, cdId, clId, ceTel, ceEmail, cePic) values('{$ceName}', {$cdId}, {$clId}, '{$ceTel}', '{$ceEmail}','{$fileName}')";
	mysql_query($sql);
	
}elseif($action=="update"){
	
	$ceId = $_GET["ceId"];
	//接受需要修改的信息；
	$ceName = $_POST["ceName"];
	$cdId = $_POST["cdId"];
	$clId = $_POST["clId"];
	$ceEmail = $_POST["ceEmail"];
	$ceTel = $_POST["ceTel"];
	//图片处理:
	$cePic = $_FILES["cePic"];
	//判断图片是否修改了
	if(strlen($cePic["name"])){	//有新图
		//1 删除原图
		$sql = "select cePic from com_emp where ceId={$ceId}";
		$result = mysql_query($sql);
		$rs = mysql_fetch_assoc($result);
		if(is_file($rs["cePic"])){
			unlink($rs["cePic"]); 
		}
		//2 对新图片进行上传
		$extName = end(explode(".", $cePic["name"])); //获取新图的扩展名
		//判断文件的大小和类型
		//图片重命名
		$fileName = "public/upload/".time().rand(1000,9999).".".$extName;
		move_uploaded_file($cePic["tmp_name"], $fileName);
	}else{//保留原图
		//不修改原图，找到原来的图片
		$sql = "select cePic from com_emp where ceId={$ceId}";
		$result = mysql_query($sql);
		$rs = mysql_fetch_assoc($result);
		$fileName = $rs["cePic"];
	}
	
	$sql = "update com_emp set ceName='{$ceName}', cdId={$cdId}, clId={$cdId}, ceTel='{$ceTel}', ceEmail='{$ceEmail}', cePic='{$fileName}'";
	$sql.=" where ceId={$ceId}";
	mysql_query($sql);
	
	
}elseif($action=="delete"){ //文件和记录同时都删掉。
	$ceId = $_GET["ceId"];
	//如果要删除记录 ，必须删除原来的图片;
	$sql = "select cePic from com_emp where ceId={$ceId}";
	
	$result = mysql_query($sql);
	$rs = mysql_fetch_assoc($result);
	//判断一下 该路径下的文件是否存在，存在就删除 
	if(is_file($rs["cePic"])){
		unlink($rs["cePic"]); //删除路径指向文件
	}
	
	$sql_1 = "delete from com_emp where ceId={$ceId}";
	mysql_query($sql_1);
	
	
	
}