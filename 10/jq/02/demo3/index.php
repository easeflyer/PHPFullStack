<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#bt").click(function (){
			//alert($("#tb1").attr("width")); //获取
			//设置属性值
		})
		$("#bt1").click(function(){
			$("#tb1").attr("height","100");
		})
		$("#bt2").click(function(){
			$("#tb1").removeAttr("border");
		})
	})
</script>
<body>
<input type="button" value="点击获取属性" id="bt">
<input type="button" value="点击设置属性" id="bt1">
<input type="button" value="点击删除属性" id="bt2">
<table id="tb1" align="center" border="1" width="400" cellpadding="0" cellspacing="0">
	<tr>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
	</tr>
	<tr>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
	</tr>
	<tr>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
		<td>aaaaaaa</td>
	</tr>
</table>
</body>
</html>