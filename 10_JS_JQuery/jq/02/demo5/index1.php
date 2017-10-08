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
			//alert($("#un").val());  // 获得 text 的 value
			$("#un").val("今天天气不错"); // 设置 text 的 value
		})
	})
</script>
<body>
<input type="button" id="bt" value="点点看">
<input type="text" name="un" id="un">
</body>
</html>
