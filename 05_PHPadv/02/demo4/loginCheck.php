<?php
header("content-type:text/html;charset=utf-8");
session_start();
include("fun/inc.php");
include("fun/mysql.fun.php");
conn($db["dbHost"] ,$db["user"],$db["pwd"],$db["dbName"]);

// 提交的验证码。
$verify = $_POST["verify"];
// 提交的验证码 和 session 中的进行比较
if($_SESSION["cs"]!=$verify ){
	echo "验证码错误<a href='index.php'>返回</a>";
	exit;
}

$aName = $_POST["aName"];
$aPwd   =  $_POST["aPwd"];
//登陆过程:
$sql = "select * from admin where aName='{$aName}'"; //根据用户查找数据，用户名有没有
$count  = numRows($sql);
if($count>0){  //用户名正确:
	$rs = fetchOne($sql);
	if($rs["aPwd"]==$aPwd){
		?>
		<script type="text/javascript">
			alert("欢迎登陆");
			window.location = "main.php";
		</script>
		<?php 
		exit;
	}else{
		echo "密码错误<a href='index.php'>返回</a>";
	}
	
	
}else{
	echo "用户名错误<a href='index.php'>返回</a>";
}

?>