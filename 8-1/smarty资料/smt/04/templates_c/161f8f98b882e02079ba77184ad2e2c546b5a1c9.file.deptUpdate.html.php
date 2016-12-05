<?php /* Smarty version Smarty-3.1.15, created on 2014-03-08 06:38:30
         compiled from ".\templates\deptUpdate.html" */ ?>
<?php /*%%SmartyHeaderCode:8154531ab74d3cc6c7-93328978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '161f8f98b882e02079ba77184ad2e2c546b5a1c9' => 
    array (
      0 => '.\\templates\\deptUpdate.html',
      1 => 1394260575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8154531ab74d3cc6c7-93328978',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531ab74d41b400_49290885',
  'variables' => 
  array (
    'rs' => 0,
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ab74d41b400_49290885')) {function content_531ab74d41b400_49290885($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{
		font-size:12px;
		line-height:30px;
	}
	
</style>
<body>
<form action="deptAction.php?action=update&cdId=<?php echo $_smarty_tpl->tpl_vars['rs']->value['cdId'];?>
" method="post">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td align="right">部门名称</td>
		<td><input type="text" name="cdName" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['cdName'];?>
"></td>
	</tr>
	<tr>
		<td align="right">负责人姓名</td>
		<td>
			<select name="clId">
				<option value="-1">请选择负责人</option>
				<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

			</select>
		</td>
	</tr>
	<tr>
		<td align="right">部门职能</td>
		<td>
			<textarea rows="8" cols="60" name="cdInfo"><?php echo $_smarty_tpl->tpl_vars['rs']->value['cdInfo'];?>
</textarea>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="修改部门"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }} ?>
