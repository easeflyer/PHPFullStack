<?php /* Smarty version Smarty-3.1.15, created on 2017-01-12 15:43:59
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1141353117ae20cb110-34366849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1484207034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1141353117ae20cb110-34366849',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53117ae23b5c40_31761238',
  'variables' => 
  array (
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53117ae23b5c40_31761238')) {function content_53117ae23b5c40_31761238($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("config.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getConfigVariable('webName');?>
</title>
</head>

<body>

我是模板的首页<?php echo $_smarty_tpl->tpl_vars['str']->value;?>
      <!-- 模板变量  -->
<br />---------配置项的使用---------------<br />
电话号码: <?php echo $_smarty_tpl->getConfigVariable('webTel');?>
<br />
a的值:<?php echo $_smarty_tpl->getConfigVariable('a');?>
<br />
b的值:<?php echo $_smarty_tpl->getConfigVariable('b');?>
<br />
c的值:<?php echo $_smarty_tpl->getConfigVariable('c');?>
<br />
</body>
</html>
<?php }} ?>
