<?php /* Smarty version Smarty-3.1.15, created on 2017-02-09 15:29:00
         compiled from ".\templates\empList.html" */ ?>
<?php /*%%SmartyHeaderCode:24102589c1a3c20c187-77048134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72a673922b98f6d653234c2bb348bd20672f7d9f' => 
    array (
      0 => '.\\templates\\empList.html',
      1 => 1394418548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24102589c1a3c20c187-77048134',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_589c1a3c37f350_32626891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589c1a3c37f350_32626891')) {function content_589c1a3c37f350_32626891($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{ font-size:12px; line-height:25px; text-align:center;}
</style>
<body>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td>员工姓名</td>
		<td>所属部门</td>
		<td>直接负责人</td>
		<td>电话</td>
		<td>邮箱</td>
		<td>员工照片</td>
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
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['ceName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cdName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['clName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['ceTel'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['ceEmail'];?>
</td>
		<td><img src="<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['cePic'];?>
" width="40" height="30"></td>
		<td>
		<a href="empAction.php?action=delete&ceId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['ceId'];?>
">删除</a>
		|
		<a href="empUpdate.php?ceId=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']]['ceId'];?>
">修改	</a>
		</td>
	</tr>
	<?php endfor; endif; ?>
</table>
</body>
</html>
<?php }} ?>
