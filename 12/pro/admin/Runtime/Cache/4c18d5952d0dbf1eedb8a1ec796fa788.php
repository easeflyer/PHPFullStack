<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
	<LINK href="__PUBLIC__/images/Default.css" type=text/css rel=stylesheet>
	<LINK href="__PUBLIC__/images/xtree.css" type=text/css rel=stylesheet>
	<LINK href="__PUBLIC__/images/User_Login.css" type=text/css rel=stylesheet>
</head>

<BODY id=userlogin_body>
    
    __PUBLIC__
    __ROOT__
<DIV></DIV>

<DIV id=user_login>
<DL>
  <DD id=user_top>
  <UL>
    <LI class=user_top_l></LI>
    <LI class=user_top_c></LI>
    <LI class=user_top_r></LI></UL>
  <DD id=user_main>
  <UL>
    <LI class=user_main_l></LI>
    <LI class=user_main_c>
    <DIV class=user_main_box>
	<form action="__URL__/checkLogin" method="post">
    <UL>
      <LI class=user_main_text>用户名： </LI>
      <LI class=user_main_input><INPUT class=TxtUserNameCssClass id=TxtUserName 
      maxLength=20 name="aName"> </LI>
	  </UL>
    <UL>
		  <LI class=user_main_text>密 码： </LI>
		  <LI class=user_main_input><INPUT class=TxtPasswordCssClass id=TxtPassword 
		  type=password name="aPwd"> </LI>
	  </UL>
    <UL>
		  <LI class=user_main_text>验证码： </LI>
		  <LI class=user_main_input>
			  <span><INPUT  id=TxtPassword type=test name="ckNum" style="width:80px;"></span>
		  </LI>
		  <li><img src="__APP__/Common/verify" onclick="this.src='__APP__/Common/verify/random/'+Math.random();"></li>
	  </UL>
	  </DIV>
	  </LI>
    <LI class=user_main_r><INPUT class=IbtnEnterCssClass id=IbtnEnter 
    style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
    onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("IbtnEnter", "", true, "", "", false, false))' 
    type=image src="__PUBLIC__/images/user_botton.gif" name=IbtnEnter> 
	</LI></UL>
	</form>
  <DD id=user_bottom>
  <UL>
    <LI class=user_bottom_l></LI>
    <LI class=user_bottom_c> </LI>
    <LI class=user_bottom_r></LI></UL></DD></DL></DIV><SPAN id=ValrUserName 
style="DISPLAY: none; COLOR: red"></SPAN><SPAN id=ValrPassword 
style="DISPLAY: none; COLOR: red"></SPAN><SPAN id=ValrValidateCode 
style="DISPLAY: none; COLOR: red"></SPAN>
<DIV id=ValidationSummary1 style="DISPLAY: none; COLOR: red"></DIV>

<DIV></DIV>

</FORM></BODY>
</html>