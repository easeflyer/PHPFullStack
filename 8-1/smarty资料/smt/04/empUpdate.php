<?php
include 'config.php';
$ceId = $_GET["ceId"];

//查找所需修改的员工记录
$sql = "select * from com_emp where ceId={$ceId}";
$result = mysql_query($sql);
$rs = mysql_fetch_assoc($result);
$st->assign("rs" ,$rs);

//部门默认选中项
$sql_1 = "select * from com_dept";
$result_1 = mysql_query($sql_1);
$html_1 = "";
while($rs_1 = mysql_fetch_assoc($result_1)){
	$html_1 .= "<option value='".$rs_1["cdId"]."' ";
	if($rs["cdId"]==$rs_1["cdId"]){
		$html_1.= " selected='selected'";
	}
	$html_1.=">".$rs_1["cdName"]."</option>";
	
}
$st->assign("html_1",$html_1);

//负责人默认选中项
$sql_2 = "select * from com_leader";
$result_2 = mysql_query($sql_2);
$html_2 = "";
while($rs_2 = mysql_fetch_assoc($result_2)){
	$html_2 .= "<option value='".$rs_2["clId"]."' ";
	if($rs["clId"]==$rs_2["clId"]){
		$html_2.= " selected='selected'";
	}
	$html_2.=">".$rs_2["clName"]."</option>";
}
$st->assign("html_2",$html_2);


$st->display("empUpdate.html");