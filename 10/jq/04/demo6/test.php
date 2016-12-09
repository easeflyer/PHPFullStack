<?php
$link = mysql_connect("localhost","root","");
mysql_query("set names utf8");
mysql_select_db("test",$link);
$sql = "select * from users";
$result = mysql_query($sql);
while($rs = mysql_fetch_assoc($result)){
	$rows[] = $rs;
}
echo json_encode($rows);
?>
