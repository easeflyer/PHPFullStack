<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		//jquery 代码
		// 基本选择器 * 全部元素
		$("*").css("background","#ff0000");
		$("#one").css("background","#00ff00");
		$(".oneC").css("background","#efefef");
		$("p").css("background","#ff0000");
		$("#one,.oneC,p").css("background","#ffccdd");
                $("#one").css("background","#ff0000");
	})
</script>
<body>
<div id="one">aaaaaaaaaa</div>
<div class="oneC">aaaaaaaaaa</div>
<div class="oneC">aaaaaaaaaa</div>
<div>aaaaaaaaaa</div>
<div>aaaaaaaaaa</div>
<p>ccccccc</p>
<span>ddddddddd</span>
<p>eeeeeeeee</p>
</body>
</html>
