<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="__URL__/addAction" method="post" enctype="multipart/form-data">
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">会员添加</th>
    </tr>
    <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员名称</td>
      <td class="td_bg" width="70%"><input type="text" name="uName" /><td>
    </tr>
	 <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员密码</td>
      <td class="td_bg" width="70%"><input type="password" name="uPwd" /><td>
    </tr>
	 <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员电话</td>
      <td class="td_bg" width="70%"><input type="text" name="uTel" /><td>
    </tr>
	 <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员邮箱</td>
      <td class="td_bg" width="70%"><input type="text" name="uEmail" /><td>
    </tr>
	 <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员头像</td>
      <td class="td_bg" width="70%"><input type="file" name="uPic" /><td>
    </tr>
	 <tr>
      <td class="td_bg" width="30%" height="23" align="right">会员地址</td>
      <td class="td_bg" width="70%"><input type="text" name="uAddress" /><td>
    </tr> 
    <tr>
      <td  colspan="2" class="td_bg" align="center"><input  type="submit" value="添加会员"></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>