<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index.php11111</title>
</head>
    
<script type="text/javascript">
// 因为要给 bt1 添加事件，因此使用 window.onload 目的是 等所有 html 加载完毕，才能绑定事件。
window.onload = function(){
	var bt1 = document.getElementById("bt1");
	bt1.onclick = function(){
		history.forward();
	}
}

</script>
    
<body>

<a href="test.php">首先点击链接跳转到test111111</a>
<input type="button" value="前进" id="bt1" />

</body>
</html>
