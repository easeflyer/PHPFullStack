<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form id="myform" name="f1" method="post" action="<?php echo ($posturl); ?>">
		<input type="text" name="p0_Cmd" value="<?php echo ($p0_Cmd); ?>">
		<input type="text" name="p1_MerId" value="<?php echo ($p1_MerId); ?>">
		<input type="text" name="p2_Order" value="<?php echo ($p2_Order); ?>">
		<input type="text" name="p3_Amt" value="<?php echo ($p3_Amt); ?>">
		<input type="text" name="p4_Cur" value="<?php echo ($p4_Cur); ?>">
		<input type="text" name="p8_Url" value="<?php echo ($p8_Url); ?>">
		<input type="text" name="pd_FrpId" value="<?php echo ($pd_FrpId); ?>">
		<input type="text" name="hmac" value="<?php echo ($hmac); ?>">
                                <!--input type="submit" value="ok" / -->
	</form>
	<script type="text/javascript">
		var _form=document.getElementById('myform');
		_form.submit();
	</script>
</body>
</html>