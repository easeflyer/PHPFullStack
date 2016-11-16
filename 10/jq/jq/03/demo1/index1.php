<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(function(){
	/*
		$("#panel h1").mouseover(function(){
			$("div.content").hide();
		}).mouseout(function(){
			$("div.content").show();
		})
		
		$("#panel h1").bind("mouseover",function(){
			$("div.content").hide();
		}).bind("mouseout",function(){
			$("div.content").show();
		})
		*/
		/*
		$("#panel h1").hover(function(){
				$("div.content").hide();
		},function(){
			 $("div.content").show();
		})
		*/
		$("#panel h1").toggle(function(){
			$(".content").show();
		},function(){
			$(".content").hide();
		})
	})
</script>
<body>
<div id="panel">
	<h1>你喜欢 什么运动</h1>
	<div class="content">足球和篮球</div>
</div>
</body>
</html>
