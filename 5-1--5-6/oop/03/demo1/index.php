<?php
/**
 *  调用数据库类
 *  写出查询语句。
 *  执行查询 返回数组
 *  fetchAll 构造了多维数组
 */

include("include/DB.class.php"); // 连接数据库 ，并且实例化 $db 对象，通常不建议在类文件里实例化。
$sql = "select * from books";
$rs = $db->fetchAll($sql);  // fetchAll 构造了多维数组
//print_r($rs);
?>
<table align="center" border="1">
	<tr>
		<td>aId</td>
		<td>书名</td>
		<td>出版社</td>
                <td>作者</td>
	</tr>
	<?php 
	foreach($rs as $key=>$val){ // 遍历数组进行输出
	?>
	<tr>
		<td><?php echo $val["bId"]?></td>
		<td><?php echo $val["bName"]?></td>
		<td><?php echo $val["bPublishing"]?></td>
                <td><?php echo $val["bAuthor"]?></td>
	</tr>
	<?php 
	}
	?>
</table>