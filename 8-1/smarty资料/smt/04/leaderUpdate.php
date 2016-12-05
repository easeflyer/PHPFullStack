<?php
include "config.php";
$clId = $_GET["clId"];
//根据接收到得id 把id所在的记录 全部列出到页面。
$sql = "select * from com_leader where clId={$clId}"; //1条记录
$result = mysql_query($sql);
$rs = mysql_fetch_assoc($result);

$st->assign("rs",$rs);


$st->display("leaderUpdate.html");