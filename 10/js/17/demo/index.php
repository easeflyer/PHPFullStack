<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
#dv1{
	overflow:scroll; /*div内容超过div大小，显示滚动条*/
}
</style>
<script type="text/javascript">
	window.onload = function(){
		var dv1 = document.getElementById("dv1");
		//alert(dv1.style.width);
		//alert(dv1.style.height);
		alert(dv1.clientWidth+"******");
		alert(dv1.offsetWidth);
	}
</script>
<body>
<div id="dv1" style="width:200px; height:200px; border:1px solid #ff0000">
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
aaaaaaaaaaa<br />
</div>
</body>
</html>
