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
				//alert($("#dv1").attr("class")); // 获得 #dv1 的 class 属性值 one
				//$("#dv1").attr("class","two");    // two 没有边框
				$("#dv1").addClass("th");			// 添加 th class 原有class 保持
		})
		$("#bt1").click(function (){
			alert($("#dv1").hasClass("th"));		// 点击上面按钮后 true 否则 false
			alert( $("#dv1").is("div") );        // 判断 #dv1
			alert( $("#dv1").is(".one") );		 // true
			alert( $("#dv1").is("#dv1") );  	// true
			$("#dv1").removeClass("th");		// true
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
		/*color:#00ff00;*/
		font-size:36px;
		font-weight:100; /* 粗体 */
	}
</style>
<body>
<input type="button" id="bt" value="操作class">
<input type="button" id="bt1" value="删除class">
<div id="dv1" class="one">aaaa</div>
</body>
</html>
