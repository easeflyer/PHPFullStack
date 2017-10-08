<?php 
include 'config/DB.class.php';
$eId = $_GET["eId"];
//原纪录
$sql = "select * from emp where eId={$eId}";
$rs = $db->fetchOne($sql);
//原来部门 --》emp   3
//列出所有部门 --》dept   3部门是默认选中项
//

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="inc/css.css" type="text/css" />
</head>

<body>
<form name="form1" method="post" action="empAction.php?action=update&eId=<?php echo $eId; ?>" enctype="multipart/form-data">
  <table width="1052" border=0 align=center cellpadding=2 cellspacing=1 bordercolor="#799AE1" class=tableBorder>
    <tbody>
      <tr>
        <th align=center colspan=16 style="height: 23px">员工修改</th>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align="center" class=txlrow>&nbsp;</td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">员工姓名</td>
        <td align="left" class=txlHeaderBackgroundAlternate><input type="text" name="eName" value="<?php echo $rs["eName"]?>"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">性别</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<input type="radio" name="eSex" value="1" <?php echo $rs["eSex"]==1?"checked='checked'":"" ;?>>男
        	<input type="radio" name="eSex" value="2" <?php echo $rs["eSex"]==2?"checked='checked'":"" ;?>>女
        </td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">学历</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        <input type="text" name="eEdu"  value="<?php echo $rs["eEdu"]?>"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">原照片</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<img src="<?php echo $rs["eImg"]?>" width="80" height="60">
        </td>
       </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">照片</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<input type="file" name="eImg">
        </td>
       </tr>
<?php 
$sql_dept = "select * from dept";
$rows = $db->fetchAll($sql_dept);
?>	
		<tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">所属部门</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<select name="dId">
        		<option>请选择部门</option>
        		<?php 
        		foreach($rows as $key=>$val){
        			
        		?>
        		<option value="<?php echo $val["dId"]?>" <?php echo $rs["dId"]==$val["dId"]?"selected='selected'":'';?> ><?php echo $val["dName"]?></option>
        		<?php 
        		}
        		?>
        	</select>
        </td>       
        </tr> 
        <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">掌握技能</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<textarea rows="8" cols="60" name="eTec"><?php echo $rs["eTec"]?></textarea>
        </td>
      </tr>
        <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">工作经验</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<textarea rows="8" cols="60" name="eExp"><?php echo $rs["eExp"]?></textarea>
        </td>
      </tr>
        
      
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align=center bgcolor="#DEE5FA" class=txlrow>
        	<input type="submit" value="修改员工">
        </td>
      </tr>
	  </tbody>
</table>
</form>
</body>
</html>

