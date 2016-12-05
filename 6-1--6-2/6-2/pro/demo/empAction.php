<?php
include 'config/DB.class.php';
include 'config/upload.class.php';
$action = $_GET["action"];
if($action=="insert"){
	// 接受所有员工的信息;
	$eName = $_POST["eName"];
	$eSex = $_POST["eSex"];
	$eEdu = $_POST["eEdu"];
	
	$dId = $_POST["dId"];
	$eTec = $_POST["eTec"];
	$eExp = $_POST["eExp"];
	$eImg = $_FILES["eImg"]; //图片信息组成的数组
	$upImg = new upload($eImg);
	$filePath = $upImg->main();
	$sql = "insert into emp(eName, eSex, eEdu, eImg, eTec, eExp, dId)";
	$sql.= " values('{$eName}', {$eSex}, '{$eEdu}', '{$filePath}', '{$eTec}', '{$eExp}', {$dId})";
	$db->query($sql);
	
}else if($action=="update"){
	//接收所有数据 以及 id
	$eId = $_GET["eId"];
	$eName = $_POST["eName"];
	$eSex = $_POST["eSex"];
	$eEdu = $_POST["eEdu"];
	
	$dId = $_POST["dId"];
	$eTec = $_POST["eTec"];
	$eExp = $_POST["eExp"];
	$eImg = $_FILES["eImg"]; //图片信息组成的数组
	print_r($eImg);
	
	//图片: 涉及到图片 上传的过程 检测图片是否要修改 
	//判断图片是否修改
	if(strlen($eImg["name"])>0){
		//有新图修改
		// 1 删掉原图:
			$sql_1 = "select eImg from emp where eId={$eId}";
			$rs_1 = $db->fetchOne($sql_1);
			//print_r($rs_1);
			if(is_file($rs_1["eImg"])){  //是文件 文件存在 执行删除
				unlink($rs_1["eImg"]);
			}
		//2 上传新图
			$upImg = new upload($eImg);
			$filePath = $upImg->main();
	}else{
		//没有图片修改
		$sql_1 = "select eImg from emp where eId={$eId}";
		$rs_1 = $db->fetchOne($sql_1);
		$filePath = $rs_1["eImg"];
	}
	
	//修改纪录
	$sql = "update emp set eName='{$eName}', eSex='{$eSex}',eImg='{$filePath}', eEdu='{$eEdu}', eTec='{$eTec}', eExp='{$eExp}', dId='{$dId}'";
	$sql.= " where eId={$eId}"; 
	$db->query($sql);
}else if($action=="delete"){
	$eId = $_GET["eId"];
	//需要先删除员工的照片 找到图片的路径 unlink(url)删除照片
	$sql_1 = "select eImg from emp where eId={$eId}";
	$rs = $db->fetchOne($sql_1);

	
	if(is_file($rs["eImg"])){  //是文件 文件存在 执行删除
		unlink($rs["eImg"]);
	}
	
	$sql = "delete from emp where eId={$eId}";
	$db->query($sql);	
}