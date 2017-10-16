<?php /* Smarty version Smarty-3.1.15, created on 2017-08-31 14:49:11
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2077853153b66c1dd74-31923646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1504162148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2077853153b66c1dd74-31923646',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53153b66c76896_08724674',
  'variables' => 
  array (
    'arr' => 0,
    'str' => 0,
    'brr' => 0,
    'crr' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53153b66c76896_08724674')) {function content_53153b66c76896_08724674($_smarty_tpl) {?>                                     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
    
-------------------增加一个数组元素-------------------<br />
<?php echo $_smarty_tpl->tpl_vars['arr']->value;?>
<br />
<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
---<?php echo $_smarty_tpl->tpl_vars['arr']->value[1];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[3];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[4];?>
<br />
<?php $_smarty_tpl->createLocalArrayVariable("arr", null, 0);
$_smarty_tpl->tpl_vars["arr"]->value[] = "zhangsan";?> <!-- 增加了张三 -->
<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
---<?php echo $_smarty_tpl->tpl_vars['arr']->value[1];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[3];?>
----<?php echo $_smarty_tpl->tpl_vars['arr']->value[4];?>
<br />


<br />----------assign---------------<br />
<?php $_smarty_tpl->tpl_vars["str"] = new Smarty_variable("我很爱国", null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['str']->value;?>



<br />----------assign索引---------------<br />
<?php $_smarty_tpl->tpl_vars["brr"] = new Smarty_variable(array(11,222,333), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['brr']->value[1];?>



<br />----------assign关联---------------<br />
<?php $_smarty_tpl->tpl_vars["crr"] = new Smarty_variable(array("un"=>"zhangsan","ua"=>18,"ul"=>178), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['crr']->value["ua"];?>



<br />----------for---------------<br />
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 2;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	i:<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<br />
<?php }} ?>

<br />----------if else---------------<br />

<?php if ($_smarty_tpl->tpl_vars['str']->value=="我很爱国") {?>  <!--  $str 在上面 assign 区域赋值 -->
显示这里
<?php } else { ?>
else显示这里
<?php }?>

</body>
</html>
<?php }} ?>
