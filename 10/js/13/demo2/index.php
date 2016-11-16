<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
.one{
	width:400px;
	border:1px solid #ff0000;
}
.two{
	width:200px;
	height:120px;
	background-color:#C7FCF5;
	margin:30px;
}
span{ /* 里面的div 文字*/
	width:20px;
	height:80px;
	background-color:#FF3333;
	margin:20px;
}
</style>


<script type="text/javascript">
	window.onload = function(){
		var outdiv = document.getElementById("outdiv");
		var innerdiv = document.getElementById("innerdiv");
		var ipt = document.getElementById("ipt1");
		alert(innerdiv);
		alert("ipt.nodeName:"+ipt.nodeName+"ipt.nodeType:"+ipt.nodeType+"ipt.nodeValue:"+ipt.nodeValue);
		alert(innerdiv.parentNode.innerHTML);  // 获得 outdiv 的内容。
	}
</script>


<body>
	<div id="outdiv" class="one">
		我是最外边的div
		<p class="two">我是段落标记</p>
		<div id="innerdiv" value="ddddddddddd" class="two">
			<span>我是里面的div</span>
		</div><input id="ipt1" type="text" value="334455" />
		<h4 class="two">我是标题h4标记</h4>
	</div>
</body>
</html>
