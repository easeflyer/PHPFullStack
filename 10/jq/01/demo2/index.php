<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
	body{
		font-size:12px;
		margin:0px;
		padding:0px;
	}
	.subCategoryBox{
		border:1px solid #ff0000;
		width:500px;
	}
	ul{ list-style:none; height:120px;}
	ul li{
		float:left;
		width:150px;
		line-height:25px;
	}
	.showmore{
		border:1px solid #ff0000;
		width:120px;
		text-align:center;
		line-height:25px;
		margin:auto;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		 var $category = $("ul li:gt(5):not(:last)"); //选择 序号>5 不包含最后一个 中间的内容。
		 $category.hide();
		 //选择器 选中 更多的对象
		 var $toggleBtn = $("div.showmore>a");
		 //click 《==》 onclick  jquery中的时间 没有 on
		 $toggleBtn.click(function(){
		 		//如果没有中间的那几个品牌，点击后就应该 显示出来， 
				//如果有中间的那几个品牌，点击后品牌消失
				//:visible 可见  对象.is(:visible)
				if( $category.is(":visible")){ //可见
					$category.hide();
					$(".showmore a span").text("更多");//改变  超链接中的文字
				}else{ //不可见
					$category.show();
					$(".showmore a span").text("收起");//改变  超链接中的文字
				}
		 })
	})
</script>
<body>
<div class="subCategoryBox">
	<ul>
		<li>三星</li>
		<li>联想</li>
		<li>爱国者</li>
		<li>华为</li>
		<li>sony</li>
		<li>东芝</li>
		<li>希捷</li>
		<li>奥林巴斯</li>
		<li>飞利浦</li>
		<li>华硕</li>
		<li>清华同方</li>
		<li>微软</li>
		<li>小米</li>
		<li>其他品牌</li>
	</ul>
	<div class="showmore">
		<a href="#"><span>更多</span></a>
	</div>
</div>
</body>
</html>
