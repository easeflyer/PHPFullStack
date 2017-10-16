<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(event){
   var evObj = event || window.event;
   var div1 = document.getElementById("div1");
   div1.onclick = function(e){  // 这个 e 也是 event
   	// offsetX offsetY 相对于div的 左上角来确定起位置的。
   		var ev = e ||  window.event;
		var ox = ev.offsetX || ev.layerX;
		var oy = ev.offsetY || ev.layerY;
		div1.innerHTML = "ox="+ox+"-----"+"oy="+oy;
   }
}
</script>
<body>
<div id="div1" style="width:200px;height:200px;border:1px solid #FF0000"></div>
</body>
</html>
