<?php 
include 'config/DB.class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="inc/css.css" type="text/css" />
</head>

<body>
<form name="form1" method="post" action="empAction.php?action=insert" enctype="multipart/form-data">
  <table width="1052" border=0 align=center cellpadding=2 cellspacing=1 bordercolor="#799AE1" class=tableBorder>
    <tbody>
      <tr>
        <th align=center colspan=16 style="height: 23px">员工添加</th>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align="center" class=txlrow>&nbsp;</td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">员工姓名</td>
        <td align="left" class=txlHeaderBackgroundAlternate><input type="text" name="eName"></td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">性别</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<input type="radio" name="eSex" value="1" checked="checked">男
        	<input type="radio" name="eSex" value="2">女
        </td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">学历</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        <input type="text" name="eEdu"></td>
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
        		<option value="<?php echo $val["dId"]?>"><?php echo $val["dName"]?></option>
        		<?php 
        		}
        		?>
        	</select>
        </td>       
        </tr> 
        <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">掌握技能</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<textarea rows="8" cols="60" name="eTec"></textarea>
        </td>
      </tr>
        <tr align="center" bgcolor="#799AE1">
        <td align="right" class="txlHeaderBackgroundAlternate">工作经验</td>
        <td align="left" class=txlHeaderBackgroundAlternate>
        	<textarea rows="8" cols="60" name="eExp"></textarea>
        </td>
      </tr>
        
      
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align=center bgcolor="#DEE5FA" class=txlrow>
        	<input type="submit" value="添加员工">
        </td>
      </tr>
	  </tbody>
</table>
</form>
</body>
</html>

