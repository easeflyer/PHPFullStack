<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我是文档标题</title>
<script type="text/javascript">
// 遍历所有文档对象
window.onload = function(){
		var alls = document.all;
		//alert(alls.length);
		for(var i=0;i<alls.length;i++){
			alert(alls[i].tagName+"\n\n"+alls[i].innerHTML);
		}
}
</script>
</head>
<body>
	<input type="button" value="点击" id="bt">
	<div id="dv1" class="ds">aaaaaaaaaaaa</div>
	<div id="dv2" class="ds">bbbbbbbbbbbb</div>
	<div id="dv3" class="ds">cccccccc</div>
	<img src="imgs/1.jpg">
</body>
</html>
