<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-29 18:13:27
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:28019589ac69dcfb319-72911013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1504001605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28019589ac69dcfb319-72911013',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_589ac69dd2dfa0_70260816',
  'variables' => 
  array (
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589ac69dd2dfa0_70260816')) {function content_589ac69dd2dfa0_70260816($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<br />------------自定义修饰符------------<br />
<!-- 注意这里 fun1,fun12,13,14 都可以-->
<?php echo fun13($_smarty_tpl->tpl_vars['str']->value);?>


<br />------------自定义单标记------------<br />


<?php echo fun2(array('size'=>"30",'color'=>"red",'content'=>"我很爱国"),$_smarty_tpl);?>




<br />------------自定义双标记------------<br />
<?php $_smarty_tpl->smarty->_tag_stack[] = array('test12', array('color'=>"red")); $_block_repeat=true; echo fun31(array('color'=>"red"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

你也很爱国<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo fun31(array('color'=>"red"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</body>
</html>
<?php }} ?>
