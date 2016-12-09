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
			// :checkbox 没有见过？ 查手册：表单选择器
			//$("[name=items]:checkbox").attr("checked",true);  // 这里使用 attr 无法二次全选
			$("[name=items]:checkbox").prop("checked",true);
		})
		$("#uncheckAll").click(function(){
			// :checkbox 没有见过？ 查手册：表单选择器
			//$("[name=items]:checkbox").removeAttr("checked");  // 有效
			$("[name=items]:checkbox").prop("checked",false);  // 有效
			//$("[name=items]:checkbox").removeProp("checked");  // 无效。
		})

		$("#checkRev").click(function(){
			$("[name=items]:checkbox").each(function(){
					//$(this).attr("checked",!$(this).attr("checked")); jq 1.* 版本的时候可以 2.* 
					var s = $(this)[0]; // 转换为 js  对象； this 代表的就是遍历的每隔匹配元素
					s.checked = !s.checked; // js  对象的 checked 属性 设置。
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
	<input type="button" id="uncheckAll" value="取消全选">
	<input  type="button" id="checkRev" value="反选">
</form>
</body>
</html>
