<?php
//  引入配置
include 'config.php';

//  获得操作参数
$action = $_GET["action"];

//  根据操作参数执行不同的流程
if($action=="insert"){	
	$cdName 	= $_POST["cdName"];
	$clId 			= $_POST["clId"];
	$cdInfo 		= $_POST["cdInfo"];
	$sql = "insert into com_dept(cdName, cdInfo, clId) values('{$cdName}', '{$cdInfo}', {$clId})";
	mysql_query($sql);
	
}elseif($action=="update"){
	$cdId = $_GET["cdId"];
	$cdName 	= $_POST["cdName"];
	$clId 		= $_POST["clId"];
	$cdInfo 	= $_POST["cdInfo"];
	$sql = "update com_dept set cdName='{$cdName}',clId= {$clId},cdInfo= '{$cdInfo}' where cdId={$cdId}";
	echo $sql;
}elseif($action=="delete"){
	$cdId = $_GET["cdId"];
	$sql = "delete from com_dept where cdId={$cdId}";
	mysql_query($sql);
}
?>
<script type="text/javascript">
	alert("部门操作成功");
	window.location='deptList.php';
</script>