<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
	ul{
		list-style:none;
		margin:auto;
	}
	ul li{
		border:1xp solid #ff0000;
		float:left;
		margin-left:15px;
	}
	#rem{
		position:absolute;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("img").mouseover(function(e){
			 var newImg = "<img src="+this.src+" width='200' height='150' id='rem'>";
			 $("body").append(newImg);
			 $("#rem").css({
			 	"top":e.pageY+"px",
				"left":e.pageX+"px"
			 })
		}).mouseout(function(){
			$("#rem").remove();
		})
	})
</script>
<body>
<ul>	
	<li><img src="imgs/1.jpg" width="60" height="40"></li>
	<li><img src="imgs/2.jpg" width="60" height="40"></li>
	<li><img src="imgs/3.jpg" width="60" height="40"></li>
	<li><img src="imgs/4.jpg" width="60" height="40"></li>
</ul>
</body>
</html>
