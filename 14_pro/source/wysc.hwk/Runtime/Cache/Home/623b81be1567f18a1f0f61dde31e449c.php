<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="__SKIN__/css/shopflow.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/header.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/reset.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script src="__SKIN__js/jq.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('#<?php echo ($_GET['step']); ?>').css('backgroundColor', '#ff0000').css('color', '#ffffff').css('fontWeight', 'bold');
            })
            function submitaddress() {
                var _form = document.getElementById('addressform');
                _form.submit();
            }
        </script>
        <title>选择收货地址-3C商城</title>
    </head>
    <body>
        <!--顶部导航开始-->
<div class="mini-nav">
    <div class="mini-main">
        <div class="fast-nav">
            <?php if($_USER[id]): ?><span 
                    <?php if($_USER[sex] == 1): ?>class="usericon1"
                    <?php elseif($_USER[sex] == 2): ?>
                    class="usericon"
                    <?php else: endif; ?>
                    >欢迎你:<?php echo ($_USER[username]); ?></span> | <a href="<?php echo U('User/logout');?>">退出登录</a>
            <?php else: ?>
            <a href="<?php echo U('User/login');?>">登录</a> | <a href="<?php echo U('User/register');?>">免费注册</a><?php endif; ?>
            | <a href="<?php echo U('User/ucenter');?>">会员中心</a> | <a href="<?php echo U('shoppingflow/step',array('step'=>'shoppingcar'));?>">购物车</a> | <a href="">帮助中心</a>
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
            <h1><a href="__APPURL__"><img src="__SKIN__images/index_03.jpg" alt="" /></a></h1>
            <div class="searchform">
                <div class="form">
                    <form name="f1" method="post" action="<?php echo U('Index/search');?>">
                        <input type="text" name="keyword" class="keyword" />
                        <input type="submit" name="s1" value="" class="searchbtn"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="allcate">
            </div>
            <ul class="navigator">
                <?php if(is_array($navdata)): $i = 0; $__LIST__ = $navdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="item"><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>"><?php echo ($item[catename]); ?></a></li>
                    <li class="item">|</li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--头部结束-->
        <div class="clear"></div>
        <div class="main">
            <div class="shopflow">
                <ul>
                    <li id="shoppingcar">购物车</li>
                    <li id="shoppingaddress">选择收货地址</li>
                    <li>选择配送方式</li>
                    <li>选择付款方式</li>
                    <li>付款</li>
                    <li class="ll">确认订单</li>
                </ul>
                <div class="clear"></div>
                <div class="shopcar">
                    <form name="f1" action="<?php echo U('shoppingflow/step',array('step'=>'shoppingaddress'));?>" id="addressform" method="post" enctype="multipart/form-data">   
                        <table class="table-form" border="0" width="100%">
                            <?php if(is_array($addressdata)): $i = 0; $__LIST__ = $addressdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <td colspan="4" style="padding: 10px 10px; text-align:left !important; font-weight:bold; color:red;">选择该地址 <input type="radio" name="addressid" value="<?php echo ($val["id"]); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>收货人</th><td colspan="3" style="text-align:left !important"><input type="text" name="contact" class="ipt" style="width: 336px;" value="<?php echo ($val["contact"]); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>详细地址</th><td colspan="3" style="text-align:left !important"><input type="text" name="address" class="ipt" style="width: 500px;" value="<?php echo ($val["address"]); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>电话</th><td style="width: 270px; text-align:left !important;"><input type="text" name="tel" class="ipt" style="width: 200px;" value="<?php echo ($val["tel"]); ?>" /></td>
                                    <th>手机</th><td style="text-align:left !important"><input type="text" name="phone" class="ipt" style="width: 200px;" value="<?php echo ($val["phone"]); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>标志性建筑</th><td style="width: 270px; text-align:left !important;"><input type="text" name="signbuild" class="ipt" style="width: 200px;" value="<?php echo ($val["signbuild"]); ?>" /></td>
                                    <th>最佳送货时间</th><td style="text-align:left !important"><input type="text" name="besttime" class="ipt" style="width: 200px;" value="<?php echo ($val["besttime"]); ?>" /></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table> 
                    </form>  
                </div>    
                <hr style="color:dddddd; margin-top:10px">
                    <div class="nextbtn">
                        <a onclick="submitaddress()" href="javascript:void(0)">
                            <image src="__SKIN__/images/nextbtn.png" width="150"/>
                        </a>
                    </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footer">
    <img src="__SKIN__images/index_77.gif" width="1000" height="282" alt="" />
</div>
    </body>
</html>