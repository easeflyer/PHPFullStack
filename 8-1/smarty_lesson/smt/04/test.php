<?php
include 'config.php';
for($i=0;$i<100;$i++){
	$clName = "aaa_".$i;
	$sql = "insert into com_leader(clName) values('{$clName}')";
	mysql_query($sql);
}