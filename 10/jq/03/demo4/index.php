<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
	#panel{
		border:1px solid #ff0000;
		width:100px;
		height:100px;
		position:relative;
		background:#33FF00;
	}
</style>
<script type="text/javascript">
	$(function(){
			$("#panel").click(function(){
					//$(this).animate({left:"400px",height:"200px"},3000).animate({top:"400px"},3000).css("background","#cecece");//left:"400px" 距离左边的距离加400px
				$(this).animate({left:"400px"},3000,function(){ alert("动画执行完毕") });
			})
		
	})
</script>
<body>
	<div id="panel"></div>
</body>
</html>
