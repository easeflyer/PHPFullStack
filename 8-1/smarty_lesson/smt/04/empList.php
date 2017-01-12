<?php
include 'config.php';
//员工相关的信息列到页面
$sql = "select ce.ceId,ce.ceName,ce.ceTel,ce.ceEmail,ce.cePic,cd.cdName,cl.clName  from com_emp as ce";
//通过员工查找部门  员工表.部门id = 部门表.部门id
$sql.=" left join com_dept as cd on ce.cdId=cd.cdId ";
//通过员工查找 负责人  员工表.负责人id=负责人表.负责人id
$sql.=" left join com_leader as cl on cd.clId=cl.clId";
//.........
$result = mysql_query($sql);


$rows = array();
while($rs = mysql_fetch_assoc($result)){
	$rows[] = $rs;
}
$st->assign("rows",$rows);


$st->display("empList.html");