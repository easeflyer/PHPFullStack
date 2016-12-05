<?php
include 'config/DB.class.php';
//部门数据的处理页面
// 增加部门  删除 部门 修改部门
$action = $_GET["action"];


if($action=="insert"){
	//print_r($_POST);
	$dName 		= $_POST["dName"];
	$dMan 		= $_POST["dMan"];
	$dManTel 	= $_POST["dManTel"];
	$dInfo 			= $_POST["dInfo"];
	$sql = "insert into dept(dName, dInfo, dMan, dManTel)";
	$sql.=" values('{$dName}', '{$dInfo}', '{$dMan}', '{$dManTel}')";
	$db->query($sql);
}else if($action=="delete"){
	//删除的参数 数据表中的id
	$dId = $_GET["dId"];
	$sql = "delete from dept where dId={$dId}";
	$db->query($sql);
	
}else if($action=="update"){
	//计算机分不清你具体修改了那些数据，把所有数据都更新 一次
	$dId = $_GET["dId"];
	//防止 数据安全 误修改；
	$dName 		= isset($_POST["dName"])?$_POST["dName"]:"";
	/*
	if(isset($_POST["dName"]) || $_POST["dName"]!=""){
		echo "修改部门名称";
	}
	*/
	$dMan 		= $_POST["dMan"];
	$dManTel 	= $_POST["dManTel"];
	$dInfo 			= $_POST["dInfo"];
	$sql = "update dept set dName='{$dName}', dInfo='{$dInfo}', dMan='{$dMan}', dManTel='{$dManTel}' where dId={$dId}";
	$db->query($sql);
	//注意:
	/*
	 * 页面中的sql  
	 * 带单引号: 字符串 日期 枚举 text char
	 * 不带单引号  ：数值型数据 不带单引号
	 * */
}
?>
<script type="text/javascript">
	//alert("操作成功");
	//window.location="deptList.php";
</script>