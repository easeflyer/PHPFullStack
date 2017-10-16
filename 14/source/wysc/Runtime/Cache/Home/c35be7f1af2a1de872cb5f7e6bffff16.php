<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>选择支付方式-3C商城</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>
        <link rel="stylesheet" type="text/css" href="__SKIN__css/shopflow.css" />
        <script type="text/javascript">
            $(function () {
                $('#<?php echo ($_GET['step']); ?>').css('backgroundColor', '#ff0000').css('color', '#ffffff').css('fontWeight', 'bold');

            })
            function submitform() {
                var _form = document.getElementById('myform');
                _form.submit();
            }
        </script>
    </head>

    <body>
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

        <div class="main">
            <div class="shopflow">
                <ul>
                    <li id="shoppingcar">购物车</li>
                    <li>选择收货地址</li>
                    <li id="shippingtype">选择配送方式</li>
                    <li id="payment">选择付款方式</li>
                    <li>付款</li>
                    <li class="ll">确认订单</li>
                </ul>
                <div class="clear"></div>
                <form id="myform" name="f1" action="" method="POST" enctype="multipart/form-data">
                    <div class="shopcar">

                        <table class="table-form" border="1" width="100%">
                            <tr>
                                <th style="width:70px">选择</th>
                                <th>支付方式</th>
                                <th>描述</th>
                            </tr>

                            <tr>
                                <td align="center"><input type="radio" name="paymenttype" value="1" checked="checked" 
                                                          ></td>
                                <td>余额支付</td>
                                <td>使用用户在本商城内的账户余额进行商品支付，在用户选择退款时，退换的相关费用将存储在用户余额当中</td>

                            </tr>
                            <tr>
                                <td align="center"><input type="radio" name="paymenttype" value="2"
                                                          ></td>
                                <td>易宝支付</td>
                                <td>支付宝（中国）网络技术有限公司是国内领先的第三方支付平台，致力于提供“简单、安全、快速”的支付解决方案。支付宝公司从2004年建立开始，始终以“信任”作为产品和服务的核心。旗下有“支付宝”与“支付宝钱包”两个独立品牌。自2014年第二季度开始成为当前全球最大的移动支付厂商。</td>

                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="4" style="text-align:right; height:30px; line-height:30px; font-size:14px; " align="right"><span style="color:red;font-weight:bold" id="sumprice"></span></td>
                            </tr>
                        </table>


                    </div>
                    <hr style="color:dddddd; margin-top:10px">
                        <div class="nextbtn">
                            <!--点击下一步 提交表单-->
                            <a onclick="submitform()" href="javascript:void(0)">
                                <image src="__SKIN__images/nextbtn.jpg" width="150"/>
                            </a>
                        </div>
                </form>
            </div>
        </div>
        <div class="footer">
<img src="__SKIN__images/index_77.gif" width="1000" height="282" />
</div>
        <!--商品列表结束-->
        </div>
    </body>

</html>