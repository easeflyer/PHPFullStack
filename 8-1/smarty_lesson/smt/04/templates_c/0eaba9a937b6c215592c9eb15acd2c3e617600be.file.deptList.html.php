<?php /* Smarty version Smarty-3.1.15, created on 2017-02-08 13:40:05
         compiled from ".\templates\deptList.html" */ ?>
<?php /*%%SmartyHeaderCode:2284589aaf35d561f5-17852667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eaba9a937b6c215592c9eb15acd2c3e617600be' => 
    array (
      0 => '.\\templates\\deptList.html',
      1 => 1394259678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2284589aaf35d561f5-17852667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_589aaf36061c07_27450736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589aaf36061c07_27450736')) {function content_589aaf36061c07_27450736($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{
		font-size:12px;
		line-height:25px;
	}
</style>
<body>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr align="center">
		<td>部门名称</td>
		<td>部门负责人</td>
		<td>部门负责人电话</td>
		<td>操作</td>
	</tr>
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
	<tr align="center">
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clTel'];?>
</td>
		<td>
		<a href="deptAction.php?action=delete&cdId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdId'];?>
">删除 </a>
		|
		<a href="deptUpdate.php?cdId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdId'];?>
">修改</a>
		</td>
	</tr>
	<?php endfor; endif; ?>
</table>
</body>
</html>
<?php }} ?>
