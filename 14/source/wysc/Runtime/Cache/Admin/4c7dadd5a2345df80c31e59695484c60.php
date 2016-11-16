<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改订单状态</title>
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>
<link rel="stylesheet" type="text/css" href="__SKIN__css/tableform.css" />
</head>
<body>
<div  class="easyui-panel" data-options="
	title:'修改订单状态',
	border:false,
	iconCls:'icon-cart_edit'
">
<form name="f1" action="" method="POST" enctype="multipart/form-data">
<table class="table-form" border="1" width="100%">
	<tr>

		<th>订单状态</th><td><input type="hidden" name="orders_id" value="<?php echo ($orderid); ?>" /> <select name="orderstate_id" class="easyui-combobox">
		    <?php if(is_array($statedata)): $i = 0; $__LIST__ = $statedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"
			<?php if($item["id"] == $stateid): ?>selected<?php endif; ?>
			><?php echo ($item["state"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select></td>
	</tr>
	
	<tr>
		<th>修改理由</th><td>
		<textarea name="info" rows="9" cols="60"></textarea>
		</td>
	</tr>
	<tr>
		<th></th><td><input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="r1" value="清除"></td>
	</tr>
</table>

</form>
</div>
</body>
</html>