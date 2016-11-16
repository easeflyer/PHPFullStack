<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript">
window.onload = function(){
	var fs = document.forms;
	//alert(fs.length);
	alert(fs[0].innerHTML);
        alert(fs[1].innerHTML);
}
</script>
</head>
<body>
<form name="frm1" id="frm1" action="#" method="post">
	<input type="text" name="un" />
</form>
<form name="frm2" id="frm2" action="#" method="post">
	<input type="text" name="uc" />
</form>
</body>
</html>
