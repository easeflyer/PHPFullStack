<?php
include 'config.php';
$action = $_GET["action"];
if($action=="insert"){
	
	$cdName 	= $_POST["cdName"];
	$clId 			= $_POST["clId"];
	$cdInfo 		= $_POST["cdInfo"];
	$sql = "insert into com_dept(cdName, cdInfo, clId) values('{$cdName}', '{$cdInfo}', {$clId})";
	mysql_query($sql);
	
}elseif($action=="update"){
	$cdId = $_GET["cdId"];
	$cdName 	= $_POST["cdName"];
	$clId 			= $_POST["clId"];
	$cdInfo 		= $_POST["cdInfo"];
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