<?php
include("fun/inc.php");
include("fun/mysql.fun.php");
session_start();

if(!isset($_SESSION['aId'])){
    echo "尚未登录。session aId 没有值。";
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
        /**
         * 类似 用户增删改 模块，没有太多变化。
         * 注意 分类 部分 有 cn  cn1 大分类 和 子分类
         */
        
	$sql_0 = "select * from news";
	$count = numRows($sql_0);               // 总记录数
	$pageSize = 2;                          // 每页显示几条记录
	$totalPage = ceil($count/$pageSize);    // 总页数
	
	if(isset($_GET["page"]) && $_GET["page"]){  // 确定当前页，避免超出 totalPage 范围
		$page = $_GET["page"];
		if($page>$totalPage){$page=$totalPage;}
	}else{
		$page=1;
	}
	
        // 构造 Sql 查询出 本页的数据，注意链接查询部分。
	$start = ($page-1)*$pageSize;   // 确定 limit start 的位置   0,1  2,3  4,5      第3页的 start = （3-1）* 2 = 4
	$sql = "select n.nId,n.nTitle,n.nSourceName,n.nDate,cg.cgName as cn,cg1.cgName as cn1 from news as n ";
	$sql.=" left join category as cg on n.cFid=cg.cgId ";  //查找主类型  都是左连接到 news
	$sql.=" left join category as  cg1 on n.cSid=cg1.cgId "; // 第二次 链接 category 用 cSid
	$sql.= " limit {$start},{$pageSize}"; //查找所有主类型
	$rs = fetch($sql);
        
        // 循环输出 本页每条数据到 一个 tr 行
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
        
        /**
         *  下面 页码的显示 参照 之前的 用户 增删改查模块。
         */
        
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
