<?php 
include("inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<script type="text/javascript">
	$(function(){
			$("#one").change(function(){
				$.ajax({
					type:"get",
					url:"getTwo.php?rad="+Math.random()+"&oneId="+$(this).val(),
					dataType:"html",
					success:function(data){
						$("#two").html(data);
					}
				})
				
			})
			$("#two").change(function(){
				$.ajax({
					type:"get",
					url:"getThree.php?rad="+Math.random()+"&twoId="+$(this).val(),
					dataType:"html",
					success:function(data){
						$("#three").html(data);
					}
				})
				
			})

	})
</script>
<body>
<?php 
$sql = "select * from class where pId=0";
$result = mysql_query($sql);
?>
<select id="one">
	<option value="-1">请选择第一级</option>
	<?php
	while($rs = mysql_fetch_assoc($result)){
	?>
	<option value="<?php echo $rs["id"]?>"><?php echo $rs["title"]?></option>
	<?php
	}
	?>
</select>
<select id="two">
	<option value="-1">请选择第二级</option>
</select>
<select id="three">
	<option value="-1">请选择第三级</option>
</select>
</body>
</html>
