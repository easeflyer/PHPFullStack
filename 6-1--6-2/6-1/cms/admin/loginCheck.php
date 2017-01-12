<?php 
header("content-type:text/html;charset=utf-8");
include("fun/inc.php");
include("fun/mysql.fun.php");
session_start();

$aName = trim($_POST["aName"]);
//正则验证:
$modeName = "/^[a-zA-Z0-9_]{5,18}$/";
if(!preg_match($modeName,$aName,$arr)){
	echo "用户名输入格式 不对<a href='index.php'>返回</a>";
	exit; //终止 后边的程序运行
}
$aPwd = trim($_POST["aPwd"]);
$sql = "select * from admin where aName='{$aName}'"; //根据用户名查找记录
$count = numRows($sql);
if($count>0){
	$rs = fetchOne($sql);
	if($rs["aPwd"]==$aPwd){
			//创建管理员的session
			$_SESSION["aId"] = $rs["aId"];
			$_SESSION["aName"] = $rs["aName"];
        ?>
	<script type="text/javascript">
		alert("欢迎登陆 ");
		window.location="main.php";
	</script>
        <?php 
	}else{
		echo "用户密码错误<a href='index.php'>返回</a>";
		exit; //终止 后边的程序运行		
	}
	
}else{
	echo "用户名错误<a href='index.php'>返回</a>";
	exit; //终止 后边的程序运行
}
?>