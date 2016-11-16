<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
	window.onload = function(){
		var bt = document.getElementById("bt");
		//bt.onclick = function(){} //脚本中为元素绑定事件
		bt.onclick = aa; //脚本中绑定事件
		function aa(){
			alert("我是 aa 函数");
		}
	}

	function bb(){
		alert("我是 bb 函数");
	}
</script>
<body>
<input type="button" id="bt" value="测试">
<!--元素上直接绑定事件，注意这里绑定aa 无效，因为 aa 在匿名函数内定义的。不在全局作用域-->
<img width="100" height="100" onclick="bb();">
</body>
</html>
