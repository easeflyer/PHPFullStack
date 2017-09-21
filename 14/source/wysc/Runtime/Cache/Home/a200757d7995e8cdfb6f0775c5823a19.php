<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>首页-3C商城</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__css/index.css"/>
    </head>
    <style>
        .banks{ margin-left: 20px; }
        .banks li{ float: left; margin: 5px 10px; }
        .banks li *{ float: left; }
        .banks li input{ margin-top: 18px; margin-right: 5px; }
    </style>
    <body>
        <!--顶部导航开始-->
        <link type="text/css" rel="stylesheet" href="__SKIN__css/reset.css" />
<link type="text/css" rel="stylesheet" href="__SKIN__css/header.css" />
<script type="text/javascript" src="__SKIN__js/jquery-1.7.2.min.js"></script>
<div class="mini-nav">
    <div class="mini-main">
        <div class="fast-nav">
        <?php if($_USER[id]): ?><span 
        <?php if($_USER[sex] == 1): ?>class="usericon1"
        <?php elseif($_USER[sex] == 2): ?>
        class="usericon"
        <?php else: endif; ?>
        >欢迎你:<?php echo ($_USER[username]); ?></span>| <a href="<?php echo U('User/logout');?>">退出登录</a>
        <?php else: ?>
        <a href="<?php echo U('User/login');?>">登录</a> | <a href="<?php echo U('User/register');?>">免费注册</a><?php endif; ?>
            
            | <a href="<?php echo U('User/ucenter');?>">会员中心</a> | <a href="<?php echo U('Shoppingflow/step',array('step'=>'shoppingcar'));?>"> 购物车</a> | <a href="">帮助中心</a>
        </div>
        <div class="date">
            <?php echo ($nowtime); ?>
        </div>
    </div>
</div>
<!--顶部导航结束-->
<div class="wrap">
    <!--头部开始-->
    <div class="header">
        <div class="header-top">
            <h1><a href=""><img src="__SKIN__images/index_03.jpg" /></a></h1>
            <div class="searchform">
                <div class="form">
                    <form name="f1" method="get" action="<?php echo U('Index/search');?>">
                        <input type="text" name="keyword" class="keyword" />
                        <input type="submit" name="s1" value="" class="searchbtn" />
                    </form>
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="allcate">
            </div>
            <!--全部分类：主菜单-->
            <ul class="navigator">
                <?php if(is_array($navdata)): $i = 0; $__LIST__ = $navdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="item"><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>"><?php echo ($item[catname]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--头部结束-->

        <!--第一屏开始-->
        <div style=" text-align:center; font-size:14px;margin:0 auto; margin-top:20px; margin-bottom:20px;  min-height:100px; background:#f1f1f1; font-weight:bold; padding-top:10px; line-height:1.5em; border:1px solid #dddddd; padding: 20px;">
            <h3>选择支付银行</h3>
            <form action="" name="f1" method="post">
                <ul class="banks">
                    <li><input type="radio" name="pd_FrpId" value="CCB-NET-B2C"/><img src="__SKIN__images/yh1.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="BOC-NET-B2C"/><img src="__SKIN__images/yh2.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="CMBC-NET-B2C"/><img src="__SKIN__images/yh3.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="BOCO-NET-B2C"/><img src="__SKIN__images/yh4.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="ICBC-NET-B2C"/><img src="__SKIN__images/yh5.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="HXB-NET-B2C"/><img src="__SKIN__images/yh6.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="CMBCHINA-NET-B2C"/><img src="__SKIN__images/yh7.png" width="166" height="47" alt="" /></li>
                    <li><input type="radio" name="pd_FrpId" value="ABC-NET-B2C"/><img src="__SKIN__images/yh8.png" width="166" height="47" alt="" /></li>
                </ul>
                <div class="clear">
                </div>
                <input type="submit" name="s1" value="提交" />
            </form>
        </div>

        <div class="footer">
<img src="__SKIN__images/index_77.gif" width="1000" height="282" />
</div>

        <!--商品列表结束-->
        </div>
        <script type="text/javascript">
            setTimeout(goto, 5000);
        </script>
    </body>
</html>