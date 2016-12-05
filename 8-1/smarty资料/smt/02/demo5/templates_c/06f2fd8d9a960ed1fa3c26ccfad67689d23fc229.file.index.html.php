<?php /* Smarty version Smarty-3.1.15, created on 2014-03-04 02:15:37
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1714653144ca4c790e6-56509556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1393899332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1714653144ca4c790e6-56509556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53144ca4d4a496_37876973',
  'variables' => 
  array (
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53144ca4d4a496_37876973')) {function content_53144ca4d4a496_37876973($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_fun1')) include 'Plugin\\modifier.fun1.php';
if (!is_callable('smarty_function_fun2')) include 'Plugin\\function.fun2.php';
if (!is_callable('smarty_block_fun3')) include 'Plugin\\block.fun3.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php echo smarty_modifier_fun1($_smarty_tpl->tpl_vars['str']->value);?>
<br />
<?php echo smarty_function_fun2(array('size'=>"20",'color'=>"red",'content'=>"我很爱国"),$_smarty_tpl);?>
<br />
<?php echo smarty_function_fun2(array('size'=>"36",'color'=>"green",'content'=>"aaaaaaaaaaaaa"),$_smarty_tpl);?>
<br />
<?php $_smarty_tpl->smarty->_tag_stack[] = array('fun3', array('size'=>"40",'color'=>"red")); $_block_repeat=true; echo smarty_block_fun3(array('size'=>"40",'color'=>"red"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	你也很爱国
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_fun3(array('size'=>"40",'color'=>"red"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</body>
</html>
<?php }} ?>
