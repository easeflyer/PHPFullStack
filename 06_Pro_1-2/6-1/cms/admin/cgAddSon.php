<?php
$cgId = $_GET["cgId"];//主类 id   确定为那个主类添加子类

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="cgActionSon.php?act=insert&cgId=<?php echo $cgId;?>" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="40">
		<td align="right">子类名称</td>
		<td><input type="text" name="cgName"></td>
	<tr>
	<tr height="40">
		<td align="center" colspan="2"><input  type="submit" value="添加子类"></td>
	<tr>
</table>
</form>
</body>
</html>
