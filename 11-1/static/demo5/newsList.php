<?php 
$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("news",$link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<style type="text/css">
	tr{
		font-size:12px;
		line-height:30px;
	}
</style>
<body>
新闻>本地新闻
<table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
	<?php 
	$sql = "select aId,aTitle,aDate,aFilePath  from article";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_assoc($result)){
	?>
	<tr>
		<td><a href="admin/<?php echo $rs["aFilePath"]?>"><?php echo $rs["aTitle"]?></a></td>
		<td><?php echo $rs["aDate"]?></td>
	</tr>
	<?php 
	}
	?>
</table>
</body>
</html>
