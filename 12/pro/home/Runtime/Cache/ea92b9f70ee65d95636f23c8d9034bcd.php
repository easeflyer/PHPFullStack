<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/book.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/sign.css" />

</head>

<body>
<!--快捷访问栏开始-->
<div id="shortcut">
	<div class="page_width">
		<ul>
			<li class="welcome">您好！欢迎来到京东商城！<span><a href="#">[请登录]</a>，新用户？<a href="#" class="link_reg">[免费注册]</a></span></li>
			<li class="my_order"><a href="#">我的订单</a></li>
			<li><a href="#">我的京东</a></li>
			<li><a href="#" target="_blank">装机大师</a></li>
			<li><a href="#" target="_blank">礼品卡</a></li>
			<li><a href="#" target="_blank">企业客户</a></li>
			<li class="sub">
                <a href="#" target="_blank">帮助中心</a>
            </li>
		</ul>
		<span class="clear"></span>
	</div>
</div>

<!--登录-->

<div class="page_width">

	<div class="login_logo">
    	<img src="__PUBLIC__/home/images/logo_login.gif" />
    </div>
    <div id="login">
    	<div class="login_tit">
        	<h2>用户登录</h2><span></span>
        </div>
        <div class="login_form">
        	<div class="form">
				<form action="__URL__/loginCheck" method="post">
             	<div class="form_info">
                	<div class="label">用户名：</div><input type="text" name="uName"  class="text"/>
                </div>
             	<div class="form_info">
                	<div class="label">密码：</div><input type="password" name="uPwd" class="text"/>&nbsp;&nbsp;<a href="#">忘记密码？</a>
                </div>
                <div class="form_info">
                	<div class="label">&nbsp;</div>
                	<input type="checkbox" checked="checked"/>记住用户名 
                    <input type="checkbox" />自动登录
                </div>
                <div class="form_info">
                	<div class="label">&nbsp;</div>
					<input type="image" src="__PUBLIC__/home/images/login.jpeg">
                </div>
				</form>
				
                <div class="cor_web">
                    使用合作网站账号登录京东：<br />
                    <img src="__PUBLIC__/home/images/cor_web.jpeg" />
                </div>
            </div>
            
            <div class="login_right">
            	<p>还不是京东商城用户？</p>
				<div class="guide_content">
                	现在免费注册成为京东商城用户，便能立刻享受便宜又放心的购物乐趣。
                </div>
                <div id="new_register"><a href="#"><img src="__PUBLIC__/home/images/new_reg.jpeg" /></div>
				<div id="other_register"><a href="#">企业用户注册</a>   <a href="#">校园用户注册</a></div>
            </div>
        </div>
    </div>
    
</div>

<div class="clear"></div>
<!--脚部开始-->
<div class="page_width">
	<div id="footer">
		<div class="flinks">
            <a href="#" target="_blank">关于我们</a>
            |
            <a href="#" target="_blank">联系我们</a>
            |
            <a href="#" target="_blank">人才招聘</a>
            |
            <a href="#" target="_blank">商家入驻</a>
            |
            <a href="#" target="_blank">广告服务</a>
            |
            <a href="#" target="_blank">京东社区</a>
            |
            <a href="#" target="_blank">友情链接</a>
            |
            <a href="#" target="_blank">销售联盟</a>
        </div>
		<div class="copyright">
        北京市公安局海淀分局备案编号：1101081681&nbsp;&nbsp;京ICP证070359号&nbsp;&nbsp;
        <a href="# target="_blank">音像制品经营许可证苏宿批005 号</a><br>Copyright&copy;2004-2011&nbsp;&nbsp;360buy京东商城&nbsp;版权所有
        </div>
		<div class="ilinks">
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/f_icp.gif" width="108" height="40" alt="经营性网站备案中心">
            </a>
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/knetSealLogo.jpg" width="112" height="40">
            </a>
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/f_hdwj.jpg" width="108" height="40" alt="海淀网络警察">
            </a>
        </div>
	</div>
</div>
</body>
</html>