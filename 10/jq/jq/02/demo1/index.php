<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#ap").click(function(){
			  var $td1 = $("<td>1111111111</td>");
			  var $td2 = $("<td>2222222222</td>");
			
			  var $tr = $("<tr></tr>");
			  $tr.append($td1);
			  $tr.append($td2);
			  $("#tb1").append($tr);
		})
		$("#rm").click(function(){
			 //求要删除元素的长度
			 	$len = $("#tb1 tr").length-1;
				$("#tb1 tr:eq("+$len+")").remove();
		})
	})
</script>
<body>
	<table align="center" cellpadding="0" cellspacing="0" border="1" id="tb1">
		<tr>
			<td><input type="button" value="append" id="ap"></td>
			<td><input type="button" value="romove" id="rm"></td>
		</tr>
		<tr>
			<td>11111</td>
			<td>22222</td>
		</tr>
	</table>
</body>
</html>
