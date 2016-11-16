<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(function(){
		 $("table tr:odd").attr("class","odd");
		 $("tbody>tr").hover(function(){
		 		$("tbody>tr").removeClass("selected");
				$(this).addClass("selected");
		 },function(){
		 		$("tbody>tr").removeClass("selected");
		 })
	})
</script>
<style type="text/css">
	.odd { background-color:#D7FBF8;}
	.selected{ background-color:#FF0000;}
</style>
<body>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="400">
	<thead>
		<tr>
			<td>姓名</td>
			<td>性别</td>
			<td>居住地</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>张三</td>
			<td>男</td>
			<td>湖南</td>
		</tr>
		<tr>
			<td>李四</td>
			<td>女</td>
			<td>湖北</td>
		</tr>
		<tr>
			<td>王五</td>
			<td>男</td>
			<td>山西</td>
		</tr>
		<tr>
			<td>赵六</td>
			<td>女</td>
			<td>上海</td>
		</tr>
	</tbody>
</table>
</body>
</html>
