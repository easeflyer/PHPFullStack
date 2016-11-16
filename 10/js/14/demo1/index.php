<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">

window.onload = function(){
	alert("window.event:"+window.event); //ie下有效。 谷歌浏览器有效
	alert("event:"+event); // 兼容性较好

	var evObj = event || window.event //ie 和 火狐兼容 谷歌都有效 ******  注意语法
	alert("兼容方式1："+evObj);
}

</script>
<body>
</body>
</html>
