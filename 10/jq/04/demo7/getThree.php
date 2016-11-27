<?php
include("inc.php");
$twoId = $_GET["twoId"]; //2
$sql = "select * from class where pId={$twoId}";
$result = mysql_query($sql);
?>
<option value="-1">请选择第三级</option>
<?php
while($rs =  mysql_fetch_assoc($result)){
	//// 构造 option 用于插入到 select 标签中
?>
	<option value="<?php echo $rs["id"]?>"><?php echo $rs["title"]?></option>
<?php
}
?>