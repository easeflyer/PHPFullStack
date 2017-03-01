<?php /* Smarty version Smarty-3.1.15, created on 2017-02-06 15:50:19
         compiled from ".\templates\demo.html" */ ?>
<?php /*%%SmartyHeaderCode:335658982abbe78b89-43567640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcdfa21442e594054818e27feb1dea9f1e063419' => 
    array (
      0 => '.\\templates\\demo.html',
      1 => 1486366592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '335658982abbe78b89-43567640',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58982abbea7999_43984888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58982abbea7999_43984888')) {function content_58982abbea7999_43984888($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("config.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("test", 'local'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<!-- 注意在第一行 引入了配置文件 config.conf 的 test 区域-->
c的值:<?php echo $_smarty_tpl->getConfigVariable('c');?>
<br />
d的值:<?php echo $_smarty_tpl->getConfigVariable('d');?>
<br />
</body>
</html>
<?php }} ?>
