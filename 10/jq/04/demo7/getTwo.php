<?php
include("inc.php");
$oneId = $_GET["oneId"]; //2
$sql = "select * from class where pId={$oneId}";
$result = mysql_query($sql);
?>
<option value="-1">请选择第二级</option>
<?php
while($rs =  mysql_fetch_assoc($result)){
?>
	<option value="<?php echo $rs["id"]?>"><?php echo $rs["title"]?></option>
<?php
}
?>