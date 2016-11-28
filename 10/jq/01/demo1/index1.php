<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		//$("div span").css("background","#ff0000");  //包含孙子元素。
		//$("div>span").css("background","#ff0000");  //不包含孙子。
		//$("#one+div").css("background","#ffccdd");
		$("#two~div").css("background","#00ff00");  //选取#two 后的所有div元素。
	})
</script>
<body>
<div>
	<p>
		<span>aaaaaaaa</span>
	</p>
	<span>bbbbbbb</span>
	<br />
	<span>cccccccc</span>
</div>
<div id="one">
	<p>
		<span>aaaaaaaa</span>
	</p>
	<span>bbbbbbb</span>
	<br />
	<span>cccccccc</span>
</div>
<div>dddd</div>
<div id="two">eeee</div>
<div>ffffff</div>
<div>ffffff</div>
<div>ffffff</div>
</body>
</html>
