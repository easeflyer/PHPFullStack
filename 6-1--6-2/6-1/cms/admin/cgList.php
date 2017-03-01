<?php
include("fun/inc.php");
include("fun/mysql.fun.php");


session_start();
if(!isset($_SESSION['aId'])){
    echo "尚未登录！";
    exit;
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	*{ font-size:12px;}
</style>
<body>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr height="30" align="center">
		<td>主类名称</td>
		<td>主类操作</td>
		<td>子类管理</td>
	<tr>
	<?php
        echo $_SESSION['aName'];
        
	$sql_0 = "select * from category where cgPid=0";
	$count = numRows($sql_0);
	$pageSize = 4;
	$totalPage = ceil($count/$pageSize);
	
	if(isset($_GET["page"]) && $_GET["page"]){
		$page = $_GET["page"];
		if($page>$totalPage){$page=$totalPage;}
	}else{
		$page=1;
	}
	
	$start = ($page-1)*$pageSize;
	$sql = "select * from category where cgPid=0 limit {$start},{$pageSize}"; //查找所有主类型
	$rs = fetch($sql);
        //print_r($rs);exit;
	foreach($rs as $key=>$val){
	?>
	<tr height="30" align="center">
		<td><?php echo $val["cgName"]?>--><?php echo $val["cgId"]?></td>
		<td>
		<a href="cgAction.php?act=delete&cgId=<?php echo $val["cgId"]?>">删除</a> 
		| 
		<a href="cgUpdate.php?cgId=<?php echo $val["cgId"]?>">修改</a>
		|
		<a href="cgAddSon.php?cgId=<?php echo $val["cgId"]?>">子类添加</a>
		</td>
		<!--需要读取对应主类型下的子类型-->
		<?php
		$sql_1 = "select * from  category where cgPid=".$val["cgId"];
                //echo $sql_1;exit;
		$rs_1 = fetch($sql_1);
		if(count($rs_1)==0){
			echo "<td align='center'>没有子类 </td>";
		}else{
		?>
		<td>
			<table align="center" border="1" cellpadding="0" width="100%">
				<?php
					foreach($rs_1 as $key_1=>$val_1){
				?>
				<tr height="25" align="center">
					<td width="120">======<?php echo $val_1["cgName"]?></td>
					<td>
						<a href="cgActionSon.php?act=delete&cgSid=<?php echo $val_1["cgId"]?>">删除</a>
						|
						<a href="cgUpdateSon.php?cgSid=<?php echo $val_1["cgId"]?>">修改</a>
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</td>
		<?php
		}
		?>
	<tr>
	<?php
	}
	?>
	<tr height="30">
		<td colspan="3" align="right">
			<a href="cgList.php?page=1">首页</a>
			|
			<a href="cgList.php?page=<?php echo $page-1;?>">上一页</a>
			|
			<?php
			if($page<=5){
				for($i=1;$i<=10;$i++){
					if($i==$totalPage){   //2==2 一共两页 页码如果到了2  后边的页码将不再输出
						?>
						<a href="cgList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
						break;
					}
			?>
				<a href="cgList.php?page=<?php echo $i?>"><?php echo $i?></a>
			<?php
				}
			}else{
				for($i=$page-4;$i<=$page+5;$i++){
					if($i==$totalPage){   //2==2 一共两页 页码如果到了2  后边的页码将不再输出
						?>
						<a href="cgList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
						break;
					}
					?>
						<a href="cgList.php?page=<?php echo $i?>"><?php echo $i?></a>
					<?php
				}
			}
			?>
			|
			<a href="cgList.php?page=<?php echo $page+1;?>">下一页</a>
			|
			<a href="cgList.php?page=<?php echo $totalPage?>">尾页</a>
		</td>
	<tr>
</table>
</body>
</html>
