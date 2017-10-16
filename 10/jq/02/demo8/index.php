<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
	body{
		margin:0px;
		padding:0px;
	}
	#dv{
		border:1px solid #ff0000;
		width:200px;
		height:100px;
		margin:25px 30px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var dv = $("#dv").offset();
                console.log(dv); // 通过浏览器 查看dv 对象
		alert(dv.top);
		alert(dv.left);
	})
</script>
<body>
<div id="dv">aaaaa</div>
<div id="dv1">bbbbb</div>
</body>
</html>
