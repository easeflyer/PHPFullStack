<?php
//1 销毁session
session_start();
session_destroy(); //销毁session
//2 退出到登陆页面 -----
//header("location:index.php");
?>
<script type="text/javascript">
	alert("退出成功");
	window.location="index.php";
</script>