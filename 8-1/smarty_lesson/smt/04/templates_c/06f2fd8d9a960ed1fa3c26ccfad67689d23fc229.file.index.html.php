<?php /* Smarty version Smarty-3.1.15, created on 2017-02-08 13:42:18
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:32460589aafba5ea0b1-38411552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1394086174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32460589aafba5ea0b1-38411552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_589aafba6a1a50_86624928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589aafba6a1a50_86624928')) {function content_589aafba6a1a50_86624928($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国际结算系统 by www.865171.cn</title>
</head>
<style>
* { margin:0 auto; padding:0; border:0;}
body { background:#0462A5; font:12px "宋体"; color:#004C7E;}
input { border:1px solid #004C7E;}
.main { background:url(images/bg.jpg) repeat-x; height:800px;}
.login { background:#DDF1FE; width:468px; height:262px; border:1px solid #000;}
.top { background:url(images/login_bg.jpg) repeat-x; width:464px; height:113px; border:1px solid #2376B1; margin-top:1px;}
.logo { background:url(images/logo.gif) no-repeat; width:214px; height:42px; float:left; margin:29px 0 0 14px;}
.lable { background:url(images/lable.gif) no-repeat; width:157px; height:32px; float:right; margin:81px 31px 0 0;}
.submit { background:url(images/submit.gif) no-repeat; width:71px; height:24px; border:0;} 
.reset { background:url(images/reset.gif) no-repeat; width:71px; height:24px; border:0;} 
</style>

<body>
<form action="loginCheck.php" method="post">
<table width="100%" class="main" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <div class="login">
        <div class="top">
          <div class="logo"></div>
          <div class="lable"></div>
        </div>
        <table width="468" cellpadding="0" cellspacing="0">
          <tr>
            <td width="282" style="padding-top:17px;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="right" height="27">用户名:</td>
                  <td align="right" width="161">
                    <input type="text" id="user" name="cmName" />
                  </td>
                </tr>
                <tr>
                  <td align="right" height="27">密码:</td>
                  <td align="right" width="161">
                    <input type="password" id="password" name="cmPwd"/>
                  </td>
                </tr>
              </table>
            </td>
            <td style="padding-top:30px;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" height="29">
                    <input name="submit" type="submit" value="" class="submit" />
                  </td>
                </tr>
                <tr>
                  <td align="center" height="29">
                    <input name="reset" type="button" class="reset" />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:28px;">
          <tr>
            <td align="center";>Conpyright 2010 www.865171.cn</td>
          </tr>
        </table>
      </div>
      <!--login -->
    </td>
  </tr>
</table>
</form>
</body>
</html>
<?php }} ?>
