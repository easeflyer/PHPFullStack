<?php 
header("content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["aName"])){
?>
<script type="text/javascript">
	alert("请登录后访问");
	//top指向的main框架页面
	top.window.location="index.php";
</script>
<?php 
exit;
}
?>