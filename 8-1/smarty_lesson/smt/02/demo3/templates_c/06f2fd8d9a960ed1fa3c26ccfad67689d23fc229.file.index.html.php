<?php /* Smarty version Smarty-3.1.15, created on 2017-01-12 16:42:25
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:62685311891c729e40-51116446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1484210544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62685311891c729e40-51116446',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5311891c785ce0_33986254',
  'variables' => 
  array (
    'str' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5311891c785ce0_33986254')) {function content_5311891c785ce0_33986254($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\ease\\php_lesson\\8-1\\smarty_lesson\\smt\\02\\demo3\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getConfigVariable('webName');?>
</title>
</head>

<body>
<br />-----------cat-----------<br />
<?php echo ($_smarty_tpl->tpl_vars['str']->value).(" 你也很爱国过");?>

<?php echo ((($_smarty_tpl->tpl_vars['str']->value).($_smarty_tpl->tpl_vars['dt']->value)).(",")).($_smarty_tpl->tpl_vars['dt']->value);?>

<br />-----------data_format-----------<br />
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dt']->value,"%Y-%m-%d %H:%M:%S");?>

</body>
</html>
<?php }} ?>
