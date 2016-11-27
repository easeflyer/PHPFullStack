<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		//$("div span").css("background","#ff0000");  //包含孙子元素。 aaa  bbb ccc
		//$("div>span").css("background","#ff0000");  //不包含孙子。 也就是只有 div 子元素 span 被选中，多层级的span 不被选中。参考下面的例子。 aaa 被排除
		//$("#one+span+div").css("background","#ffccdd"); // 必须是临近，如果不临近则无法选择到
		//$("#one+div").css("background","#ffccdd"); // 无法选择到 因为紧挨着#one 没有div元素
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
	<span>cccccccc</span>
	<div>dddd</div>
	<div id="two">eeee</div>
	<div>ffffff</div>
	<div>ffffff</div>
	<div>ffffff</div>
	<div>ffffff</div>

</body>
</html>
