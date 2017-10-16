<?php
$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("news",$link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ob静态化测试</title>
</head>
<style type="text/css">
	tr{ font-size:12px; text-align:center; line-height:25px;}
</style>
<body>
<table align="center" border="1"  width="800" cellpadding="0" cellspacing="0">
	<tr>
		<td>标题</td>
		<td>日期</td>
		<td>内容</td>
		<td>来源</td>
		<td>操作</td>
	</tr>
	<?php 
	$sql = "select * from article";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_assoc($result)){
			if(strlen($rs["aContent"])>20){
				$content = mb_substr($rs["aContent"], 0,12,"utf8")."...";
			}else{
				$content = $rs["aContent"];
			}
		if(strlen($rs["aTitle"])>12){
				$title = mb_substr($rs["aTitle"], 0,12,"utf8")."...";
			}else{
				$title = $rs["aTitle"];
			}
	?>
	<tr>
		<td><a href="<?php echo  $rs["aFilePath"] ?>"><?php echo $title ?></a></td>
		<td><?php echo $rs["aDate"] ?></td>
		<td><?php echo $content ?></td>
		<td><?php echo $rs["aSource"] ?></td>
		<td>删除 | 修改 |  <a href="indexAction.php?action=statics&aId=<?php echo $rs["aId"];?>">生成静态页</a></td>
	</tr>
	<?php 
	}
	?>
</table>
</body>
</html>
