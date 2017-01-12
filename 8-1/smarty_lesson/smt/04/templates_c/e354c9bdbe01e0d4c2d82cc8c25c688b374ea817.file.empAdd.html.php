<?php /* Smarty version Smarty-3.1.15, created on 2014-03-08 07:28:29
         compiled from ".\templates\empAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:10827531ac230ad28c9-83075443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e354c9bdbe01e0d4c2d82cc8c25c688b374ea817' => 
    array (
      0 => '.\\templates\\empAdd.html',
      1 => 1394263702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10827531ac230ad28c9-83075443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531ac230b1dd77_98192257',
  'variables' => 
  array (
    'rows' => 0,
    'rows2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ac230b1dd77_98192257')) {function content_531ac230b1dd77_98192257($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{ font-size:12px; line-height:30px;}
</style>
<body>
<form action="empAction.php?action=insert" method="post" enctype="multipart/form-data">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td align="right">员工姓名</td>
		<td><input type="text" name="ceName"></td>
	</tr>
	<tr>
		<td align="right">所在部门</td>
		<td>
			<select name="cdId">
				<option value="-1">请选择部门</option>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['key'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['key']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['name'] = 'key';
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rows']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['key']['total']);
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdId'];?>
"><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdName'];?>
</option>
				<?php endfor; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">负责人</td>
		<td>
			<select name="clId">
				<option value="-1">请选择负责人</option>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['key2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['name'] = 'key2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rows2']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['key2']['total']);
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['rows2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key2']['index']]['clId'];?>
"><?php echo $_smarty_tpl->tpl_vars['rows2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key2']['index']]['clName'];?>
</option>
				<?php endfor; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">邮箱</td>
		<td><input type="text" name="ceEmail"></td>
	</tr>
	<tr>
		<td align="right">电话</td>
		<td><input type="text" name="ceTel"></td>
	</tr>
	<tr>
		<td align="right">照片</td>
		<td><input type="file" name="cePic"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="添加员工"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }} ?>
