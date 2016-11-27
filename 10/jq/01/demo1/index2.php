<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		 //基本过滤选择器
		 //$("#one div:first").css("background","#ff0000");		// 选择第一个 div
		 //$("#one div:last").css("background","#00ff00");		// 选择最后一个 div
		 //id=one  不是第一个的div元素
		 //$("#one div:not(:first)").css("background","#00ff00"); // 选择所有 非第一个元素
		 //$("#one div:not(#fv)").css("background","#00ff00");	// 选择所有  非 idv=fv的元素
		 //$("#one div:even").css("background","#ff0000");		// 选择所有	偶数行
		//$("#one div:odd").css("background","#00ff00");		// 选择所有	奇数行
		//$("#one :header").css("background","#00ff00");     	// 选择所有 标题元素
		//$("#one div:eq(3)").css("background","#ff0000");		// 选择 索引=3 的 div
		//$("#one div:gt(2)").css("background","#ff0000");		// 选择 索引>2 的 div
		//$("#one div:lt(2)").css("background","#00ff00");		// 选择 索引<2 的 div
	})
</script>
<body>
<div id="one">
	<div id="two">aaaaaa</div>
	<div id="th">aaaaaa</div>
	
	<div id="fo">aaaaaa</div>
	<div id="fv">aaaaaa</div>

	<div id="sx">aaaaaa</div>
	<h2>h2</h2>
	<h3>h3</h3>
</div>
</body>
</html>
