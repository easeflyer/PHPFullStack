<?php /* Smarty version Smarty-3.1.15, created on 2017-08-31 14:52:46
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:215485317d6b1ae5c06-28355350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1504058512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215485317d6b1ae5c06-28355350',
  'function' => 
  array (
    'demo' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'demo1' => 
    array (
      'parameter' => 
      array (
        'uName' => 'zhangsan',
        'uAge' => '18',
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5317d6b1b3d449_03409524',
  'variables' => 
  array (
    'uName' => 0,
    'uAge' => 0,
    'test' => 0,
    'db' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5317d6b1b3d449_03409524')) {function content_5317d6b1b3d449_03409524($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
    <br />-----------函数------------------<br />
    
    
	<?php if (!function_exists('smarty_template_function_demo')) {
    function smarty_template_function_demo($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['demo']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
			我很爱国
	<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

        
	调用demo:<?php smarty_template_function_demo($_smarty_tpl,array());?>

        
        
	<br />-----------带参数的  函数------------------<br />
	<?php if (!function_exists('smarty_template_function_demo1')) {
    function smarty_template_function_demo1($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['demo1']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
			姓名是:<?php echo $_smarty_tpl->tpl_vars['uName']->value;?>
<br />
			年龄: <?php echo $_smarty_tpl->tpl_vars['uAge']->value;?>
<br />
			测试代码:<?php echo $_smarty_tpl->tpl_vars['test']->value;?>
--<?php echo $_smarty_tpl->tpl_vars['db']->value;?>

	<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

        
        <!--注意上面是定义，下面是调用-->
        
	<?php smarty_template_function_demo1($_smarty_tpl,array('test'=>"aaaaa",'db'=>"bbbbb",'uName'=>"lisi"));?>

        <!-- 注意 test db 在参数中并没有定义，在函数体中可以引用。 通常需要默认值才会在函数定义时写在参数中 -->
</body>
</html>
<?php }} ?>
