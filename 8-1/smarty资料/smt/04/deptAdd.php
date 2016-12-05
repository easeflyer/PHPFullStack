<?php
include 'config.php';

$sql = "select clId,clName from com_leader";
$result = mysql_query($sql);
$rows = array();
while($rs = mysql_fetch_assoc($result)){
	$rows[] = $rs;
}
$st->assign("rows",$rows);
$st->display("deptAdd.html");