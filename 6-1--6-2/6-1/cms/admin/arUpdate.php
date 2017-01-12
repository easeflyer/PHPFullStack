<?php


include("fun/inc.php");
include("fun/mysql.fun.php");


// 查询出 数据
$nId = $_GET["nId"];
$sql = "select * from news where nId={$nId}";
$rs = fetchOne($sql);  //子id  和 主id 有的
$str = "cg_".$rs["cFid"]."_".$rs["cSid"]; //从数据库中查出的数据



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
    
<!-- 填充表单 -->
    
<form action="arAction.php?act=update&nId=<?php echo $nId?>" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="40">
		<td align="right">文章标题</td>
		<td><input type="text" name="nTitle" value="<?php echo $rs["nTitle"]?>"></td>
	<tr>
	<tr height="40">
		<td align="right">文章来源</td>
		<td><input type="text" name="nSource" value="<?php echo $rs["nSource"]?>"></td>
	<tr>
	<tr height="40">
		<td align="right">文章来源网站名称</td>
		<td><input type="text" name="nSourceName" value="<?php echo $rs["nSourceName"]?>"></td>
	<tr>
	<tr height="40">
		<td align="right">文章类型</td>
		<td>
			<select name="cgId">
				<option value="0">请选择类型</option>
				<?php
				$sql_1 = "select * from category where cgPid=0";
				$rs_1 = fetch($sql_1);
				foreach($rs_1 as $key=>$val){
				?>
				<optgroup label="<?php echo $val["cgName"]?>">
					<?php
					//主类的cgId ; $val["cgId"];
					$sql_1 = "select * from category where cgPid=".$val["cgId"];
					$rs_1 = fetch($sql_1);
					foreach($rs_1 as $k=>$v){
						//value="cg_主类id_子类id"
						$vs = "cg_". $val["cgId"]."_". $v["cgId"];
					?>
					<option value="<?php echo $vs;?>" <?php if($str==$vs){ echo "selected='selected'";}?>><?php echo $v["cgName"]?></option>
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
		<td><textarea rows="8" cols="60" name="nContent"> <?php echo $rs["nContent"]?></textarea></td>
	<tr>

	<tr height="40">
		<td align="center" colspan="2"><input  type="submit" value="修改文章"></td>
	<tr>
</table>
</form>

</body>
</html>
