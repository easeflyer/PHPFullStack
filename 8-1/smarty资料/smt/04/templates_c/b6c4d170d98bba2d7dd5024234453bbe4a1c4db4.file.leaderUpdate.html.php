<?php /* Smarty version Smarty-3.1.15, created on 2014-03-08 02:47:27
         compiled from ".\templates\leaderUpdate.html" */ ?>
<?php /*%%SmartyHeaderCode:29787531a818d0f69e9-96282680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6c4d170d98bba2d7dd5024234453bbe4a1c4db4' => 
    array (
      0 => '.\\templates\\leaderUpdate.html',
      1 => 1394246794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29787531a818d0f69e9-96282680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531a818d144864_95172111',
  'variables' => 
  array (
    'rs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531a818d144864_95172111')) {function content_531a818d144864_95172111($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<?php echo $_smarty_tpl->tpl_vars['rs']->value;?>

<form action="leaderAction.php?action=update&clId=<?php echo $_smarty_tpl->tpl_vars['rs']->value['clId'];?>
" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td align="right">负责人姓名</td>
		<td><input type="text" name="clName" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['clName'];?>
"></td>
	</tr>
	<tr>
		<td align="right">负责人邮箱</td>
		<td><input type="text" name="clEmail"  value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['clEmail'];?>
"></td>
	</tr>
	<tr>
		<td align="right">负责人手机</td>
		<td><input type="text" name="clTel"  value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['clTel'];?>
"></td>
	</tr>
	<tr>
		<td align="right">负责人职责</td>
		<td><textarea rows="8" cols="80" name="clInfo"><?php echo $_smarty_tpl->tpl_vars['rs']->value['clInfo'];?>
</textarea></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="修改负责人"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }} ?>
