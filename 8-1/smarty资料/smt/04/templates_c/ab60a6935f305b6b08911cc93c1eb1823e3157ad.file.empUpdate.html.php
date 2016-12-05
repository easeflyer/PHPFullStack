<?php /* Smarty version Smarty-3.1.15, created on 2014-03-10 03:12:35
         compiled from ".\templates\empUpdate.html" */ ?>
<?php /*%%SmartyHeaderCode:31702531d23cff32bb0-59480872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab60a6935f305b6b08911cc93c1eb1823e3157ad' => 
    array (
      0 => '.\\templates\\empUpdate.html',
      1 => 1394421138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31702531d23cff32bb0-59480872',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_531d23d0043ea6_99126640',
  'variables' => 
  array (
    'rs' => 0,
    'html_1' => 0,
    'html_2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531d23d0043ea6_99126640')) {function content_531d23d0043ea6_99126640($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
	tr{ font-size:12px; line-height:30px;}
</style>
<body>
<?php echo $_smarty_tpl->tpl_vars['rs']->value['ceId'];?>

<form action="empAction.php?action=update&ceId=<?php echo $_smarty_tpl->tpl_vars['rs']->value['ceId'];?>
" method="post" enctype="multipart/form-data">
<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td align="right">员工姓名</td>
		<td><input type="text" name="ceName" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['ceName'];?>
"></td>
	</tr>
	<tr>
		<td align="right">所在部门</td>
		<td>
			<select name="cdId">
				<option value="-1">请选择部门</option>
				<?php echo $_smarty_tpl->tpl_vars['html_1']->value;?>

			</select>
		</td>
	</tr>
	<tr>
		<td align="right">负责人</td>
		<td>
			<select name="clId">
				<option value="-1">请选择负责人</option>
				<?php echo $_smarty_tpl->tpl_vars['html_2']->value;?>

			</select>
		</td>
	</tr>
	<tr>
		<td align="right">邮箱</td>
		<td><input type="text" name="ceEmail" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['ceEmail'];?>
"></td>
	</tr>
	<tr>
		<td align="right">电话</td>
		<td><input type="text" name="ceTel" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['ceTel'];?>
"></td>
	</tr>
	<tr>
		<td align="right">原图</td>
		<td><img src="<?php echo $_smarty_tpl->tpl_vars['rs']->value['cePic'];?>
" width="40" height="30"></td>
	</tr>
	<tr>
		<td align="right">照片</td>
		<td><input type="file" name="cePic"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="修改员工"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }} ?>
