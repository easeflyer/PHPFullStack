<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style>
	/* 因为这里定义了 文档的内外边距都是0 因此 下面的 div clientX 距离可以确定*/
	body{padding:0;margin: 0px}
</style>
<script type="text/javascript">
window.onload = function(event){
   var evObj = event || window.event;
   var div1 = document.getElementById("div1");
   //捕获鼠标的相对于浏览器 x y轴的位置。 注意这里给 document的onmouemove 绑定了函数 因此只要鼠标移动就会触发
   div1.onmousemove = function(event){
   //document.onmousemove = function(event){
   		var ev = event || window.event;
		var cx = ev.clientX; // 浏览器
		var cy = ev.clientY;
		var sx = ev.screenX; // 屏幕
		var sy = ev.screenY;
		var ofx = ev.offsetX || ev.layerX;
		var ofy = ev.offsetY || ev.layerY;
		div1.innerHTML = "clientX="+cx+ "--"+ "clientY="+cy+"<br />"+"screenX="+sx+ "--"+ "screenY="+sy+"<br />"+"offsetX="+ofx+"offsetY="+ofy;
		
   }
}
</script>
<body>
<br />
<div id="div1" style="margin-left:20px;width:200px;height:200px;border:1px solid #FF0000"></div>
</body>
</html>
