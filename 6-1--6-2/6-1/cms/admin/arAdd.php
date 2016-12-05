<?php
include("fun/inc.php");
include("fun/mysql.fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
*{
	font-size:12px;
}
</style>
<body>
<form action="arAction.php?act=insert" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="40">
		<td align="right">文章标题</td>
		<td><input type="text" name="nTitle"></td>
	<tr>
	<tr height="40">
		<td align="right">文章来源</td>
		<td><input type="text" name="nSource"></td>
	<tr>
	<tr height="40">
		<td align="right">文章来源网站名称</td>
		<td><input type="text" name="nSourceName"></td>
	<tr>
	<tr height="40">
		<td align="right">文章类型</td>
		<td>
			<select name="cgId">
				<option value="0">请选择类型</option>
				<?php
				$sql = "select * from category where cgPid=0";
				$rs = fetch($sql);
				foreach($rs as $key=>$val){
				?>
				<optgroup label="<?php echo $val["cgName"]?>">
					<?php
					//主类的cgId ; $val["cgId"];
					$sql_1 = "select * from category where cgPid=".$val["cgId"];
					$rs_1 = fetch($sql_1);
					foreach($rs_1 as $k=>$v){
						//value="cg_主类id_子类id"
					?>
					<option value="cg_<?php echo $val["cgId"]?>_<?php echo $v["cgId"]?>"><?php echo $v["cgName"]?></option>
					<?php
					}
					?>
				</optgroup>
				<?php
				}
				?>
			</select>
		</td>
	<tr>
	<tr height="40">
		<td align="right">文章内容</td>
		<td><textarea rows="8" cols="60" name="nContent"></textarea></td>
	<tr>

	<tr height="40">
		<td align="center" colspan="2"><input  type="submit" value="添加文章"></td>
	<tr>
</table>
</form>

</body>
</html>
