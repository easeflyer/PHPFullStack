<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="6" height="25">出版社列表</th>
    </tr>
	 <tr>
      <td class="td_bg" width="14%" height="23" align="center">出版社名称</td>
	  <td class="td_bg" width="14%" height="23" align="center">出版社logo</td>
	  <td class="td_bg" width="16%" height="23" align="center">操作</td>
   </tr>
	<?php if(is_array($rs)): foreach($rs as $key=>$val): ?><!--- 这次用的 foreach 实现 ---->
    <tr>
      <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["pName"]); ?></td>
	  <td class="td_bg" width="14%" height="23" align="center"><img src="__ROOT__/<?php echo ($val["pLogo"]); ?>" width="80" height="30" ></td>
	  <td class="td_bg" width="16%" height="23" align="center">删除 | 修改</td>
   </tr><?php endforeach; endif; ?>
   <tr>
      <th class="bg_tr" style="font-size:14px;" align="center" colspan="6" height="25"><?php echo ($show); ?></th>
    </tr>
	
  </tbody>
</table>

</body>
</html>