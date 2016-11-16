<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
	//选中u_1 中li  赋值一把，添加u_2中
		$("#u_1 li").click(function(){  //#ul li 所有的u_1 li 随便单击一个
			 //$(this)当前的元素对象
			 $("#u_2").append($(this).clone());
		})
	})
</script>
<body>
<div id="dv">
	<ul id="u_1">
		<li>111111111</li>
		<li>2222222</li>
		<li>333333333</li>
	</ul>
</div>
<div>
	<ul id="u_2"></ul>
</div>
</body>
</html>
