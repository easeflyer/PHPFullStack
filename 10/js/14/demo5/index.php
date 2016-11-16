<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
	document.body.onkeydown = function(e){
		var ev = e || window.event;
		//alert(ev.keyCode); //键盘码
		alert(ev.keyCode+" : "+ev.altKey);  // 按 ctrl 键 返回 true

		//  通过 keyCode 判断按下的是那个键
		switch(ev.keyCode){
			case 16:
				alert("shift");
				break;
			case 17:
				alert("ctrl");
				break;
			case 18:
				alert("alt");
				break;
		}
	}
}
</script>
<body>
<div id="div1" style="width:200px;height:200px;border:1px solid #ff0000"></div>
</body>
</html>
