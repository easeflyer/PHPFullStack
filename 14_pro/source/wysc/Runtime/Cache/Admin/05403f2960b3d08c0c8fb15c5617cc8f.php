<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户级别</title>
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
	title:'用户级别',
	border:false,
	iconCls:'icon-vcard_add'
">
<form name="f1" action="" method="POST" enctype="multipart/form-data">
<table class="table-form" border="1" width="100%">
	<tr>
		<th>级别名称</th><td><input type="text" name="rankname" class="ipt"></td>
	</tr>
	<tr>
		<th>最小积分</th><td><input type="text" name="minpoint" class="ipt"></td>
	</tr>
	<tr>
		<th>最大点数</th><td><input type="text" name="maxpoint" class="ipt"></td>
	</tr>
	<tr>
		<th>折扣</th><td><input type="text" name="discount" class="ipt" style="width:50px"><span style="font-size: 18px;
margin-left: 10px;
font-weight: bold;
color: red;">%</span></td>
	</tr>
	<tr>
		<th></th><td><input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="r1" value="清除"></td>
	</tr>
</table>

</form>
</div>
</body>
</html>