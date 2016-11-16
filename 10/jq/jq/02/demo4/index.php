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
				//alert($("#dv1").attr("class"));
				//$("#dv1").attr("class","two");
				$("#dv1").addClass("th");
		})
		$("#bt1").click(function (){
			$("#dv1").removeClass("th");
		})
	})
</script>
<style type="text/css">
	.one{
		border:1px solid #ff0000;
	}
	.two{
		font-size:36px;
	}
	.th{
		color:#00ff00;
		font-size:36px;
		font-weight:700;
	}
</style>
<body>
<input type="button" id="bt" value="操作class">
<input type="button" id="bt1" value="删除class">
<div id="dv1" class="one">aaaa</div>
</body>
</html>
