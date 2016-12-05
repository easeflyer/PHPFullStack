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
<form name="form1" method="post" action="">
  <table width="1052" border=0 align=center cellpadding=2 cellspacing=1 bordercolor="#799AE1" class=tableBorder>
    <tbody>
      <tr>
        <th align=center colspan=16 style="height: 23px">部门列表页面</th>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align="center" class=txlrow>&nbsp;</td>
      </tr>
      <tr align="center" bgcolor="#799AE1">
        <td align="center" class="txlHeaderBackgroundAlternate">部门名称</td>
        <td align="center" class=txlHeaderBackgroundAlternate>负责人</td>
        <td align="center" class=txlHeaderBackgroundAlternate>负责人电话</td>
        <td align="center" class=txlHeaderBackgroundAlternate>职能</td>
         <td align="center" class=txlHeaderBackgroundAlternate>操作</td>
      </tr>
      <?php 
      $sql = "select * from dept";
      $count = $db->numRows($sql);
      $pageSize = 2;
      $totalPage = ceil($count/$pageSize);
      
      if($_GET["page"]){
      	$page = $_GET["page"];
      	if($page>$totalPage){$page=$totalPage;}
      }else{
      	$page=1;
      }
      $start = ($page-1)*$pageSize;
      $sql_1 = "select * from dept limit $start,$pageSize";
		$rows= $db->fetchAll($sql_1);
      foreach($rows as $key=>$val){
      	if(strlen($val["dInfo"])>20){
      		$str = mb_substr($val["dInfo"], 0,20,"utf-8")."...";
      	}else{
      		$str = $val["dInfo"];
      	}
      ?>
       <tr align="center" >
        <td align="center" class="txlHeaderBackgroundAlternate"><?php echo $val["dName"]?></td>
        <td align="center" class="txlHeaderBackgroundAlternate"><?php echo $val["dMan"]?></td>
        <td align="center" class="txlHeaderBackgroundAlternate"><?php echo $val["dManTel"]?></td>
        <td align="center" class="txlHeaderBackgroundAlternate"><?php echo $str?></td>
         <td align="center" class="txlHeaderBackgroundAlternate">
         <a href="deptAction.php?dId=<?php echo $val["dId"]?>&action=delete">删除</a>
         |
         <a href="deptUpdate.php?dId=<?php echo $val["dId"]?>">修改</a>
         </td>
      </tr>
      <?php 
      }
      ?>
      <tr bgcolor="#DEE5FA">
        <td colspan="16" align=center bgcolor="#DEE5FA" class=txlrow>
       <a href="deptList.php?page=1"> 首页</a>
        |
        <a href="deptList.php?page=<?php echo $page-1 ; ?>">上一页</a>
        |
        <?php 
        if($page<=5){
        		for($i=1;$i<=10;$i++){
        			if($i==$totalPage){
        				echo "<a href='deptList.php?page={$i}'>[".$i."]</a>";
        				break;
        			}
        			echo "<a href='deptList.php?page={$i}'>[".$i."]</a>";
        		}
        }else{
       		 for($i=$page-4;$i<=$page+5;$i++){
        			if($i==$totalPage){
        				echo "<a href='deptList.php?page={$i}'>[".$i."]</a>";
        				break;
        			}
        			echo "<a href='deptList.php?page={$i}'>[".$i."]</a>";
        		}
        }
        ?>
        |
        <a href="deptList.php?page=<?php echo $page+1 ; ?>">下一页</a>
        |
        <a href="deptList.php?page=<?php echo $totalPage; ?>"> 尾页</a>
        </td>
      </tr>
      <tr bgcolor="#DEE5FA">
        <td colspan=16 align=center class=txlrow></td>
      </tr>
	  </tbody>
</table>
</body>
</html>
