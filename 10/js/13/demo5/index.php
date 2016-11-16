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
span{
	width:20px;
	height:80px;
	background-color:#FF3333;
	margin:20px;
}
</style>


<script type="text/javascript">
	window.onload = function(){
		var a = document.createElement("a");
		a.href="http://www.baidu.com";
		a.innerHTML = "百度";
		a.style.color = "#ff0000";
		a.setAttribute("style","color:#00ff11"); // setAttribute 设置属性
		document.body.appendChild(a);  // 追加一个节点

		// 创建一个图片 并追加到 body
		/*
		var img = document.createElement("img");
		img.src = "https://www.baidu.com/img/baidu_jgylogo3.gif";
		img.width ="300";  // 注意尺寸不要加 px 否则出错。这里默认就是 px
		img.height ="300";
		document.body.appendChild(img);
		*/
	}
</script>


<body>
	<div id="outdiv" class="one">
		我是最外边的div
		<p class="two">我是段落标记</p>    
		<div id="innerdiv" class="two">
			<span>我是里面的div</span>
		</div>
		<h4 class="two">我是标题h4标记</h4>
	</div>
	
</body>
</html>
