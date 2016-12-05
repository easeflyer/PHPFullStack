<?php
//连接数据库:
include 'config.php';
$cmName = $_POST["cmName"];
$cmPwd = $_POST["cmPwd"];
//验证登陆的过程
$sql = "select * from com_admin where cmName='{$cmName}'";
$result = mysql_query($sql);
$count = mysql_num_rows($result); // 如果count==0 没有正确用户
if($count==0){
	echo "改用户不存在<a href='index.php'>返回</a>";
	exit;
}else{
	$rs = mysql_fetch_assoc($result);
	if($rs["cmPwd"]==$cmPwd){ //密码正确
		$_SESSION["cmName"] = $cmName;
		$_SESSION["cmId"] = $rs["cmId"];
		 //echo "欢迎".$cmName."登陆<a href='main.php'>跳转</a>";
	?>
		<script type="text/javascript">
			alert("欢迎<?php echo $cmName ?>登陆"); //弹出对话框
			window.location="main.php"; //跳转页面
		</script>
	<?php
	}else{
		echo "用户密码错误<a href='index.php'>返回</a>";
		exit;
	}
}
