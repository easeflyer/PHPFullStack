<?php 
//员工列表
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
<form name="form1" method="post" action="">
  <table width="1052" border=0 align=center cellpadding=2 cellspacing=1 bordercolor="#799AE1" class=tableBorder>
    <tbody>
      <tr>
        <th align=center colspan=16 style="height: 23px">员工列表页面</th>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align="center" class=txlrow>&nbsp;</td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="center" class="txlHeaderBackgroundAlternate">员工姓名</td>
        <td align="center" class=txlHeaderBackgroundAlternate>性别</td>
        <td align="center" class=txlHeaderBackgroundAlternate>学历</td>
        <td align="center" class=txlHeaderBackgroundAlternate>照片</td>
        <td align="center" class=txlHeaderBackgroundAlternate>技能</td>
        <td align="center" class=txlHeaderBackgroundAlternate>经验</td>
         <td align="center" class=txlHeaderBackgroundAlternate>部门</td>
         <td align="center" class=txlHeaderBackgroundAlternate>操作</td>
      </tr>    
      <?php 
      //$sql = "select * from emp";
      //分页 部门列表中的分页程序，sql语句 全部都替换成 人员sql  其他代码都是一致的。
      $sql = "select e.eId,e.eName, e.eSex, e.eEdu, e.eImg, e.eTec, e.eExp,d.dName from emp as e";
      $sql.=" left join dept as d on e.dId=d.dId";
      $rs = $db->fetchAll($sql);
     foreach($rs as $key=>$val){
     	if($val["eSex"]=="1"){
     		$eSex = "男";
     	}else{
     		$eSex = "女";
     	}
      ?>
      <tr align="center" bgcolor="#799AE1">
        <td align="center" class="txlHeaderBackgroundAlternate"><?php echo $val["eName"] ?></td>
        <td align="center" class=txlHeaderBackgroundAlternate><?php echo $eSex ?></td>
        <td align="center" class=txlHeaderBackgroundAlternate><?php echo $val["eEdu"] ?></td>
        <td align="center" class=txlHeaderBackgroundAlternate><img src="<?php echo $val["eImg"] ?>" width="60"  height="40"></td>
        <td align="center" class=txlHeaderBackgroundAlternate><?php echo $val["eTec"] ?></td>
        <td align="center" class=txlHeaderBackgroundAlternate><?php echo $val["eExp"] ?></td>
         <td align="center" class=txlHeaderBackgroundAlternate><?php echo $val["dName"] ?></td>
         <td align="center" class=txlHeaderBackgroundAlternate>
         <a href="empAction.php?action=delete&eId=<?php echo $val["eId"]?>" style="color:#ffffff;">删除</a>
         |
         <a href="empUpload.php?eId=<?php echo $val["eId"]?>" style="color:#ffffff">修改</a>
         </td>
      </tr>    
      <?php 
     }
      ?>
	  </tbody>
</table>
</body>
</html>
