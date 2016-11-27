<?php
include("inc.php"); 		 // 连接诶数据库
$oneId = $_GET["oneId"]; // 获得参数
$sql = "select * from class where pId={$oneId}";  // sql 语句，获得需要的数据
$result = mysql_query($sql);
?>
<option value="-1">请选择第二级</option>
<?php
while($rs =  mysql_fetch_assoc($result)){  // mysql_fetch_assoc 循环获得每一行数据
	// 构造 option 用于插入到 select 标签中
	?>
	<option value="<?php echo $rs["id"]?>"><?php echo $rs["title"]?></option>
	<?php
}
?>