<?php /* Smarty version Smarty-3.1.15, created on 2014-03-06 07:14:09
         compiled from ".\templates\leaderAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:1247853181e01db3744-25516877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d0adb6d2c2c863590150946e83dc991acefeea4' => 
    array (
      0 => '.\\templates\\leaderAdd.html',
      1 => 1394090046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1247853181e01db3744-25516877',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53181e01e04a73_83955522',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53181e01e04a73_83955522')) {function content_53181e01e04a73_83955522($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	*{
		font-size:12px;
		line-height:25px;
	}
</style>
<body>
<form action="leaderAction.php?action=insert" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td align="right">负责人姓名</td>
		<td><input type="text" name="clName"></td>
	</tr>
	<tr>
		<td align="right">负责人邮箱</td>
		<td><input type="text" name="clEmail"></td>
	</tr>
	<tr>
		<td align="right">负责人手机</td>
		<td><input type="text" name="clTel"></td>
	</tr>
	<tr>
		<td align="right">负责人职责</td>
		<td><textarea rows="8" cols="80" name="clInfo"></textarea></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="添加负责人"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }} ?>
