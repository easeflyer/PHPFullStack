<?php
include 'config.php';


$sql = "select cd.cdId,cd.cdName,cl.clName,cl.clTel from com_dept as cd ";
$sql.=" left join com_leader as cl on cd.clId=cl.clId";
$result = mysql_query($sql);
/*
//统计记录数
$count = mysql_num_rows($result);
$pageSize = 3;
$totalPage =ceil($count/$pageSize);

if($_GET["page"]){
	$page = $_GET["page"];
	if($page>$totalPage){$page=$totalPage;}
}else{
	$page=1;
}
$start = ($page-1)*$pageSize;
//*********************
$sql_1 = "select cd.cdId,cd.cdName,cl.clName,cl.clTel from com_dept as cd ";
$sql_1.=" left join com_leader as cl on cd.clId=cl.clId limit {$start},{$pageSize}";
*/
$rows = array();
while($rs=mysql_fetch_assoc($result)){
	$rows[] = $rs;
}
$st->assign("rows",$rows);
$st->display("deptList.html");