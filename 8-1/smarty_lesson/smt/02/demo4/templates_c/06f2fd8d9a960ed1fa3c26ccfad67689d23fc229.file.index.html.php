<?php /* Smarty version Smarty-3.1.15, created on 2014-03-01 15:57:29
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2449653118f231f7a90-66309257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1393660585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2449653118f231f7a90-66309257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53118f232b5c88_23515638',
  'variables' => 
  array (
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53118f232b5c88_23515638')) {function content_53118f232b5c88_23515638($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<br />------------自定义修饰符------------<br />
<?php echo fun1($_smarty_tpl->tpl_vars['str']->value);?>


<br />------------自定义单标记------------<br />
<?php echo fun2(array('size'=>"30",'color'=>"red",'content'=>"我很爱国"),$_smarty_tpl);?>

<br />------------自定义双标记------------<br />
<?php $_smarty_tpl->smarty->_tag_stack[] = array('test', array('color'=>"red")); $_block_repeat=true; echo fun3(array('color'=>"red"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	你也很爱国
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo fun3(array('color'=>"red"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</body>
</html>
<?php }} ?>
