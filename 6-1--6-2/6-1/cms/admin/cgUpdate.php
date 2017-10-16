<?php
include("fun/inc.php");
include("fun/mysql.fun.php");
$cgId = $_GET["cgId"];
$sql = "select * from category where cgId={$cgId}";
$rs = fetchOne($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="cgAction.php?act=update&cgId=<?php echo $cgId;?>" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="40">
		<td align="right">主类名称</td>
		<td><input type="text" name="cgName" value="<?php echo $rs["cgName"]?>"></td>
	<tr>
	<tr height="40">
		<td align="center" colspan="2"><input  type="submit" value="修改主类"></td>
	<tr>
</table>
</form>

</body>
</html>
