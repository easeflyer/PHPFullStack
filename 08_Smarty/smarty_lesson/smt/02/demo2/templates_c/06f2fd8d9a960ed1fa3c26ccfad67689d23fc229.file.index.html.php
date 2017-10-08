<?php /* Smarty version Smarty-3.1.15, created on 2017-01-12 16:11:53
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:22352531181c19dc095-82681594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1393656546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22352531181c19dc095-82681594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531181c1a39fc3_00725150',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531181c1a39fc3_00725150')) {function content_531181c1a39fc3_00725150($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getConfigVariable('webName');?>
</title>
</head>

<body>
用户名:<?php echo $_SESSION['uName'];?>
<br />
通过get接收到id:<?php echo $_GET['id'];?>

</body>
</html>
<?php }} ?>
