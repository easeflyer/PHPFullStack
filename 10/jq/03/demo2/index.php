<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(function(){
		$("#bt").bind("click",fun1=function(){
			$("#text").append("<ul><li>aaaa</li><li>bbbb</li></ul>");
		}).bind("click",fun2=function(){
			$("#text").append("<ul><li>cccc</li><li>dddd</li></ul>");
		})
		$("#del_one").bind("click",function(){
			$("#bt").unbind("click",fun2);
		})
	})
</script>
<body>
<input type="button" id="bt" value="添加事件"><br />
<div id="text">
	
</div>
<input type="button" id="del_one" value="删除一个事件"><br />
</body>
</html>
