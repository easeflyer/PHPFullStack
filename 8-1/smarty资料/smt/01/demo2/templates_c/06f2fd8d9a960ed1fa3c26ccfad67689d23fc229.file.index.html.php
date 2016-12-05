<?php /* Smarty version Smarty-3.1.15, created on 2014-03-01 03:38:55
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:17042531151a0708d00-68479078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1393645132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17042531151a0708d00-68479078',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531151a075df74_32187900',
  'variables' => 
  array (
    'demo' => 0,
    'num' => 0,
    'fl' => 0,
    'bl' => 0,
    'arr' => 0,
    'brr' => 0,
    'to' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531151a075df74_32187900')) {function content_531151a075df74_32187900($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
	 <table align="center" border="1" width="600">
	 		<tr>
				<td>aaaaaaaa</td>
				<td>bbbbbbbbbb</td>
				<td>ccccccccc</td>
			</tr>
	 </table>  
	<br />--------------------------<br />
	<?php echo $_smarty_tpl->tpl_vars['demo']->value;?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['fl']->value;?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['bl']->value;?>
<br />
	<br />----------数组传递----------------<br />
	<?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
--<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
--<?php echo $_smarty_tpl->tpl_vars['arr']->value[1];?>

	<br />----------关联数组传递----------------<br />
	<?php echo $_smarty_tpl->tpl_vars['brr']->value["two"];?>
--<?php echo $_smarty_tpl->tpl_vars['brr']->value['three'];?>

	<br />----------传递对象----------------<br />
	<?php echo $_smarty_tpl->tpl_vars['to']->value->demo();?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['to']->value->test;?>
<br />
</body>
</html>
<?php }} ?>
