<?php 
include 'config/DB.class.php';
$dId = $_GET["dId"];
//根据id 找到你修改的 记录的所有信息  找到1条记录
$sql = "select * from dept where dId={$dId}";
$rs = $db->fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="inc/css.css" type="text/css" />
</head>

<body>
<form name="form1" method="post" action="deptAction.php?action=update&dId=<?php echo $dId?>">
  <table width="1052" border=0 align=center cellpadding=2 cellspacing=1 bordercolor="#799AE1" class=tableBorder>
    <tbody>
      <tr>
        <th align=center colspan=16 style="height: 23px">部门更新</th>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align="center" class=txlrow>&nbsp;</td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">部门名称</td>
        <td align="left" class=txlHeaderBackgroundAlternate><input type="text" name="dName"  value="<?php echo $rs["dName"];?>"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">部门负责人</td>
        <td align="left" class=txlHeaderBackgroundAlternate><input type="text" name="dMan"  value="<?php echo $rs["dMan"];?>"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">部门负责人电话</td>
        <td align="left" class=txlHeaderBackgroundAlternate><input type="text" name="dManTel"  value="<?php echo $rs["dManTel"];?>"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">部门职能介绍</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<textarea rows="8" cols="60" name="dInfo"> <?php echo $rs["dInfo"];?></textarea>
        </td>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align=center bgcolor="#DEE5FA" class=txlrow>
        	<input type="submit" value="修改部门">
        </td>
      </tr>
	  </tbody>
</table>
</form>
</body>
</html>
