<?php /* Smarty version Smarty-3.1.15, created on 2014-03-06 02:37:10
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:19655317dad81203b9-78523335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1394073411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19655317dad81203b9-78523335',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5317dad8179163_40970064',
  'variables' => 
  array (
    'arr' => 0,
    'val' => 0,
    'brr' => 0,
    'val1' => 0,
    'crr' => 0,
    'drr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5317dad8179163_40970064')) {function content_5317dad8179163_40970064($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<?php echo $_smarty_tpl->tpl_vars['arr']->value;?>

	<br />---------foreach----------<br />
	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
		<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<br />
	<?php } ?>
	<br />---------foreach遍历二维数组 ----------<br />
	<?php echo $_smarty_tpl->tpl_vars['brr']->value;?>
<br />
	<?php  $_smarty_tpl->tpl_vars['val1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val1']->key => $_smarty_tpl->tpl_vars['val1']->value) {
$_smarty_tpl->tpl_vars['val1']->_loop = true;
?>
		<?php echo $_smarty_tpl->tpl_vars['val1']->value["uName"];?>
---<?php echo $_smarty_tpl->tpl_vars['val1']->value["uAge"];?>
---<?php echo $_smarty_tpl->tpl_vars['val1']->value["uTel"];?>
<br />
	<?php } ?>
	<br />---------section----------<br />
	<?php echo $_smarty_tpl->tpl_vars['crr']->value;?>
<br />
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['key'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['key']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['name'] = 'key';
$_smarty_tpl->tpl_vars['smarty']->value['section']['key']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['crr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
		<?php echo $_smarty_tpl->tpl_vars['crr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key']['index']];?>
<br />
	<?php endfor; endif; ?>
	<br />---------section遍历二维数组 ----------<br />
	<?php echo $_smarty_tpl->tpl_vars['drr']->value;?>
<br />
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['key1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['name'] = 'key1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['drr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['key1']['total']);
?>
			<?php echo $_smarty_tpl->tpl_vars['drr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['key1']['index']]['uName'];?>
<br />
	<?php endfor; endif; ?>
</body>
</html>
<?php }} ?>
