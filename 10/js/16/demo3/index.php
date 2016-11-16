<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="ajax.js"></script>
</head>
<script type="text/javascript">
window.onload = function(){
	var bt1 = document.getElementById("bt1");
	bt1.onclick = function(){
		//调用ajax包
		ajax({
			type:"get",
			url:"a.php?random="+Math.random(),
			success:function(data){
					alert(data+"***");
			}
		})
	}
}
</script>
<body>
<input type="button" id="bt1" value="测试ajax">
<div id="dv1">aaaaaaaaa</div>
</body>
</html>
