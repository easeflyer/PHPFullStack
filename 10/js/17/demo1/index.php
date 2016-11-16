<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
.one{
	width:200px;
	height:200px;
	border:1px  solid #ff0000;
	position:absolute;
}
.two{
	width:100px;
	height:100px;
	border:1px solid #00ff00;
	position:absolute;
	top:10px;
	
}
</style>
<script type="text/javascript">
	window.onload = function(){
		var div1 = document.getElementsByTagName("div")[0];
		var div2 = document.getElementsByTagName("div")[1];
		alert(div2.offsetTop);
	}
</script>
<body>
	<div class="one">
		<div class="two"></div>
	</div>
</body>
</html>
