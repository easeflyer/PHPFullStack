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
				alert($("#dv1").html());  // 弹出 #dv1 包含的 html
                                //alert($("#dv1")[0].innerHTML);
				//$("#dv1").html("<h1>我很爱国</h1>"); //赋值的时候 是对原来的值进行覆盖 里面的 html  会被正常解析
				//alert($("#dv1").text());  // 弹出内容不包含 html
				$("#dv1").text("<h1>cccccc</h1>"); //赋值也是一个覆盖  设置 #dv1 里面的文本 <h1> 不会被解析
                                alert(  $("#bt").val()  );
                                
		})
	})
</script>
<body>
<input type="button" id="bt" value="点点看111" />
<div id="dv1" class="one">
    aa<p>b</p>a
</div>
</body>
</html>
