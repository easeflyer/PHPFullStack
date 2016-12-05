<?php
//负责人的处理页面 处理 增 删 改 所有的动作。
include 'config.php';

$action = $_GET["action"];
if($action=="insert"){
	$clName = $_POST["clName"];
	$clEmail = $_POST["clEmail"];
	$clTel = $_POST["clTel"];
	$clInfo = $_POST["clInfo"];
	$sql = "insert into com_leader(clName,clEmail,clTel,clInfo) values('{$clName}','{$clEmail}','{$clTel}','{$clInfo}')";
	mysql_query($sql);
}elseif($action=="update"){
	$clId = $_GET["clId"];
	$clName = $_POST["clName"];
	$clEmail = $_POST["clEmail"];
	$clTel = $_POST["clTel"];
	$clInfo = $_POST["clInfo"];
	$sql = "update com_leader set clName='{$clName}',clEmail='{$clEmail}',clTel='{$clTel}',clInfo='{$clInfo}' where clId={$clId}";
	mysql_query($sql);
	
}elseif($action=="delete"){
	$clId = $_GET["clId"];
	$sql = "delete from com_leader where clId={$clId}";
	mysql_query($sql);
}
?>
<script type="text/javascript">
	alert("负责人操作成功");
	window.location='leaderList.php';
</script>




