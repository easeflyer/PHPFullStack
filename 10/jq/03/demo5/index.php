<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
/* 定义轮播框个元素的样式 和位置*/
	div,a{margin:0px;padding:0px;}
	img{border:0px;}
	.imgsBox{
		border:1px solid #ff0000;
		width:282px;
		height:175px;
		overflow:hidden;
	}
	.img a{
		display:block;
		width:282px;
		height:164px;
	}
	.clickButton{
		background:#999999;
		width:282px;
		height: 11px;
		position:relative;
		top:-1px;
		_top:-5px;
	}
	.clickButton div{ float:right;}
	.clickButton a{
		background-color: #666666;
		border-left:1px solid #cccccc;
		line-height:11px;
		height:11px;
		font-size:10px;
		float:left;
		padding:0 10px;
		color:#FFFFFF;
		text-decoration:none;
	}
	/*.clickButton a.active 预定义的样式，后边会根据图片 的变化，样式添加到不同的 数字上。*/
	.clickButton a.active, .clickButton a:hover{background-color:#FF0000;}
</style>
<script type="text/javascript">
$(function(){
	//1  图片数组
	var arryImgs = new Array(
						"images/01.jpg",
						"images/02.jpg",
						"images/03.jpg",
						"images/04.jpg",
						"images/05.jpg"
					);
	//定义一个图片变化的计数器  数组的下标 = times -1
	var times = 1;
	function changeImage(){
		if(times==6){
			times=1;
		}
		$(".clickButton a").removeClass("active"); //删掉所有超链接的active样式		
		$(".clickButton a:nth-child("+times+")").addClass("active");
		$(".imgs img").attr("src",arryImgs[times-1]);
		times++;
	}
	var interval = window.setInterval(function(){
			changeImage();
	},1500);
	//实现的是鼠标的悬停效果
	$(".clickButton a").each(function(index){  //each 遍历选择其中的所有对象的。
			$(this).hover(function(){
				$(".clickButton a").removeClass("active");
				$(this).addClass("active");
				//终止动画
				clearInterval(interval);
				$(".imgs img").attr("src",arryImgs[index]);
				times=index+1;
				alert(times);
			},function(){
				interval = window.setInterval(function(){
						changeImage();
				},1500);
			})
	})
})
</script>
<body>
<div class="imgsBox">
	<div class="imgs">
		<a href="#">
			<img id="pic" src="images/01.jpg" width="282" height="164">
		</a>
	</div>
	<div class="clickButton">
		<div>
			<a class="active" href="">1</a>
			<a class="" href="">2</a>
			<a class="" href="">3</a>
			<a class="" href="">4</a>
			<a class="" href="">5</a>
		</div>
	</div>
</div>
</body>
</html>
