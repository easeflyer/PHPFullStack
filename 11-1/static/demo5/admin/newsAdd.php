<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{ font-size: 14px; line-height:30px;}
</style>
<body>
<form action="newsAction.php?action=insert" method="post" enctype="multipart/form-data">
<table align="center" border="1" cellspacing="0" cellspacing="0" width="800">
	<tr>
		<td align="right">标题</td>
		<td><input type="text" name="aTitle"></td>
	</tr>
	<tr>
		<td align="right">图片</td>
		<td><input type="file" name="aImg"></td>
	</tr>
	<tr>
		<td align="right">来源</td>
		<td><input type="text" name="aSource"></td>
	</tr>
	<tr>
		<td align="right">内容</td>
		<td><textarea name="aContent" rows="8" cols="60"></textarea></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="添加文章"></td>
	</tr>
</table>
</form>
</body>
</html>
