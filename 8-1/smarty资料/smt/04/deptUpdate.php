<?php
include 'config.php';
$cdId = $_GET["cdId"]; //部门编号
$sql = "select * from com_dept where cdId={$cdId}";
$result = mysql_query($sql);
$rs = mysql_fetch_assoc($result);
$st->assign("rs",$rs);
echo $rs["clId"]."<br />";
//负责人的解决
$sql_1 = "select clId,clName from com_leader";
$result_1 = mysql_query($sql_1);
$rows = array();
while($rs_1 = mysql_fetch_assoc($result_1)){
	$rows[] = $rs_1;
}

$str="";
foreach($rows as $key=>$val){
	$str.= "<option value='".$val["clId"]."' ";
	if($rs["clId"]==$val["clId"]){
		$str.=" selected='selected' "; 
	}
	$str.=">".$val["clName"]."</option>";
}
$st->assign("str",$str);
$st->display("deptUpdate.html");