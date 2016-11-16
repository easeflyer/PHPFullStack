<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>购物车-我赢商城</title>
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
            $(function() {
                $('#<?php echo ($_GET['step']); ?>').css('backgroundColor', '#ff0000').css('color', '#ffffff').css('fontWeight', 'bold');
                allprice();
            });
            function changenum(obj, _carid, _goodid){
                var _num = obj.value;
                var _url = "index.php?g=home&m=Shoppingflow&a=changegoodnum&num=" + _num + "&carid=" + _carid + "&goodid=" + _goodid;
                if (_num <= 0){
                        alert("数量不能小于0");
                        obj.value = obj.name;
                }
                // console.log(_url);
                // 返回的 _text 为产品总价
                $.get( _url, function(_text){
                    if (_text > 0){
                       $('#goodprice_' + _carid).html(_text);
                        allprice();
                    }
                });
             }
             // 计算购物车总价
            function allprice(){
                var _goodprices = $('.goodprice');
                var _total = 0;
                for (_i = 0; _i < _goodprices.length; _i++){
                    _total += parseFloat($(_goodprices[_i]).html());
                }
                $('#sumprice').html(_total);
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
                    <li>选择配送方式</li>
                    <li>选择付款方式</li>
                    <li>付款</li>
                    <li class="ll">确认订单</li>
                </ul>
                <div class="clear"></div>
                <form name="f1" action="" method="POST" enctype="multipart/form-data">
                    <div class="shopcar">

                        <table class="table-form" border="1" width="100%">
                            <tr>
                                <th style="width:70px">缩略图</th>
                                <th>名称</th>
                                <th>数量</th>
                                <th>价格小计</th>
                                <th>操作</th>
                            </tr>
                            <?php if(is_array($carinfo)): $i = 0; $__LIST__ = $carinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                    <td align="center">
                                        <a href="<?php echo U('Index/show',array('goodid'=>$item[goods_id]));?>">
                                            <?php if($item[thumb]): ?><img src="__APPURL__/Public/Uploads/<?php echo ($item[thumb]); ?>" width="64" height="64" />
                                                <?php else: ?>
                                                <img src="__SKIN__images/nopic.png" width="64" height="64" /><?php endif; ?>
                                        </a></td>
                                    <td><a href="<?php echo U('Index/show',array('goodid'=>$item[goods_id]));?>"><?php echo ($item[goodsname]); ?></a></td>
                                    <td><input type="text" name="<?php echo ($item[num]); ?>" value="<?php echo ($item[num]); ?>" style="text-align:center;width:25px;"  onblur="changenum(this, <?php echo ($item[id]); ?>, <?php echo ($item[goods_id]); ?>)" /></td>
                                    <td><span style="color:red">￥</span><span id="goodprice_<?php echo ($item[id]); ?>" class="goodprice"><?php echo ($item[price]); ?></span></td>

                                    <td align="center"><a href="<?php echo U('Shoppingflow/delcargoods',array(carid=>$item[id]));?>"><span style="color:red">移除该商品</span></a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <td>付款金额</td>
                                <td colspan="4" style="text-align:right; height:30px; line-height:30px; font-size:14px; " align="right"><span style="color:red;font-weight:bold" id="sumprice"></span></td>
                            </tr>
                        </table>


                    </div>
                    <hr style="color:dddddd; margin-top:10px">
                        <div class="nextbtn">
                            <!--点击按钮进入下一步-->
                            <a href="<?php echo U('Shoppingflow/step',array('step'=>'createorder'));?>">
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