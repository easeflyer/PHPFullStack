<?php
include("include/DB.class.php"); // 连接数据库
$sql = "select * from article";
$rs = $db->fetchAll($sql);
print_r($rs);
?>
<table align="center" border="1">
	<tr>
		<td>aId</td>
		<td>标题</td>
		<td>时间</td>
	</tr>
	<?php 
	foreach($rs as $key=>$val){
	?>
	<tr>
		<td><?php echo $val["aId"]?></td>
		<td><?php echo $val["aTitle"]?></td>
		<td><?php echo $val["aDate"]?></td>
	</tr>
	<?php 
	}
	?>
</table>