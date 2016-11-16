<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#bt").click(function (){
				//alert($("#dv1").html());
				//$("#dv1").html("我很爱国<br /><table><img>"); //赋值的时候 是对原来的值进行覆盖
				//alert($("#dv1").text());
				$("#dv1").text("cccccc"); //赋值也是一个覆盖
		})
	})
</script>
<body>
<input type="button" id="bt" value="点点看">
<div id="dv1" class="one">aa<p>a</p>a</div>
</body>
</html>
