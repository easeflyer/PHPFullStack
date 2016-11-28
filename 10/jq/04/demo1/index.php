<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(function(){
		$("#checkAll").click(function(){
			$("[name=items]:checkbox").attr("checked",true);
		})
		$("#checkRev").click(function(){
			$("[name=items]:checkbox").each(function(){
					//$(this).attr("checked",!$(this).attr("checked")); jq 1.* 版本的时候可以 2.* 
					var s = $(this)[0];
					s.checked = !s.checked;
			})
		})
	})
</script>
<body>
<form>
	你喜欢的体育运动<br />
	<input type="checkbox" name="items" value="1">足球<br />
	<input type="checkbox" name="items" value="2">橄榄球<br />
	<input type="checkbox" name="items" value="3">棒球<br />
	<input type="checkbox" name="items" value="4">篮球<br />
	<input type="checkbox" name="items" value="5">台球<br />
	<input type="button" id="checkAll" value="全选">
	<input type="button" id="checkAll" value="取消全选">
	<input  type="button" id="checkRev" value="反选">
</form>
</body>
</html>
