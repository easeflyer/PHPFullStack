<?php /* Smarty version Smarty-3.1.15, created on 2014-03-08 02:34:58
         compiled from ".\templates\leaderList.html" */ ?>
<?php /*%%SmartyHeaderCode:65505318262301d251-86869091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb735be5992713e4f919940638e8ab28e27d9f2' => 
    array (
      0 => '.\\templates\\leaderList.html',
      1 => 1394246063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65505318262301d251-86869091',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53182623071304_64785047',
  'variables' => 
  array (
    'rows' => 0,
    'html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53182623071304_64785047')) {function content_53182623071304_64785047($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr align="center">
		<td>负责人姓名</td>
		<td>负责人电话</td>
		<td>负责人邮箱</td>
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
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clTel'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clEmail'];?>
</td>
		<td>
		<a href="leaderAction.php?action=delete&clId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clId'];?>
">删除</a> 
		| 
		<a href="leaderUpdate.php?clId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clId'];?>
">修改</a></td>
	</tr>
	<?php endfor; endif; ?>
	<tr align="center">
		<td colspan="4"><?php echo $_smarty_tpl->tpl_vars['html']->value;?>
</td>
	</tr>

</table>
</body>
</html>
<?php }} ?>
