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
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="30" align="center">
		<td>文章标题</td>
		<td>来源网站</td>
		<td>发布日期</td>
		<td>文章类型</td>
		<td>文章管理</td>
	<tr>
	<?php
	$sql_0 = "select * from news";
	$count = numRows($sql_0);
	$pageSize = 2;
	$totalPage = ceil($count/$pageSize);
	
	if($_GET["page"]){
		$page = $_GET["page"];
		if($page>$totalPage){$page=$totalPage;}
	}else{
		$page=1;
	}
	
	$start = ($page-1)*$pageSize;
	$sql = "select n.nId,n.nTitle,n.nSourceName,n.nDate,cg.cgName as cn,cg1.cgName as cn1 from news as n ";
	$sql.=" left join category as cg on n.cFid=cg.cgId ";  //查找主类型
	$sql.=" left join category as  cg1 on n.cSid=cg1.cgId ";
	$sql.= " limit {$start},{$pageSize}"; //查找所有主类型
	$rs = fetch($sql);
	foreach($rs as $key=>$val){
	?>
	<tr height="30" align="center">
		<td><?php echo $val["nTitle"]?></td>
		<td><?php echo $val["nSourceName"]?></td>
		<td><?php echo $val["nDate"]?></td>
		<td><?php echo $val["cn"]?>><?php echo $val["cn1"]?></td>
		<td>
		<a href="arAction.php?act=delete&nId=<?php echo $val["nId"]?>">删除</a> 
		| 
		<a href="arUpdate.php?nId=<?php echo $val["nId"]?>">修改</a>
		</td>
	<tr>
	<?php
	}
	?>
	<tr height="30">
		<td colspan="5" align="right">
			<a href="arList.php?page=1">首页</a>
			|
			<a href="arList.php?page=<?php echo $page-1;?>">上一页</a>
			|
			<?php
			if($page<=5){
				for($i=1;$i<=10;$i++){
					if($i==$totalPage){   //2==2 一共两页 页码如果到了2  后边的页码将不再输出
						?>
						<a href="arList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
						break;
					}
			?>
				<a href="arList.php?page=<?php echo $i?>"><?php echo $i?></a>
			<?php
				}
			}else{
				for($i=$page-4;$i<=$page+5;$i++){
					if($i==$totalPage){   //2==2 一共两页 页码如果到了2  后边的页码将不再输出
						?>
						<a href="arList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
						break;
					}
					?>
						<a href="arList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
				}
			}
			?>
			|
			<a href="arList.php?page=<?php echo $page+1;?>">下一页</a>
			|
			<a href="arList.php?page=<?php echo $totalPage?>">尾页</a>
		</td>
	<tr>
</table>
</body>
</html>
