<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>个人信息管理-用户中心-3C商城</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <link href="__SKIN__css/ucentermenu.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/ucenter.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/header.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/reset.css" rel="stylesheet" type="text/css" />
        <script src="__SKIN__js/jq.js" type="text/javascript"></script>
        <script>
            function changeaddressvalue(obj, _addid) {
                $.get("index.php?g=home&m=User&a=ucenter&option=editaddressjson", {id: _addid, fieldname: obj.name, val: obj.value}, function () {
                })
            }
        </script>
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
        <div class="position">
            <h6>当前位置：</h6><a href="__APPURL__">首页</a><span>&gt;</span><a href="<?php echo U('User/ucenter');?>">用户中心</a><span>&gt;</span><a href="<?php echo U('User/ucenter',array('option'=>'selfinfo'));?>">收货地址</a>
        </div>
        <div class="main">
            <div class="left">
    <!--当前分类开始-->
    <div class="currencat">
        <h3><span>用户菜单</span></h3>
        <ul class="cat">
            <li class="item"><h4
                    <?php if($_GET['option']== 'selfinfo'): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'selfinfo'));?>">个人信息</a></h4></li>
            <li class="item"><h4
                    <?php if($_GET['option']== 'modifypwd'): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'modifypwd'));?>">修改密码</a></h4></li>
            <li class="item"><h4><a href="<?php echo U('Shoppingflow/step',array('step'=>'shoppingcar'));?>">购物车</a></h4></li>
            <li class="item"><h4
                    <?php if($_GET['option']== 'selforder'): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'selforder'));?>">订单</a></h4></li>
            <li class="item"><h4
                    <?php if(($_GET['option']== 'selfaddress') OR ($_GET['option']== 'addaddress')): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'selfaddress'));?>">收货地址</a></h4></li>
            <li class="item"><h4
                    <?php if($_GET['option']== 'selffavor'): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'selffavor'));?>">我的收藏</a></h4></li>
            <li class="item"><h4
                    <?php if($_GET['option']== 'selfcomment'): ?>class="current"<?php endif; ?>
                    ><a href="<?php echo U('User/ucenter',array('option'=>'selfcomment'));?>">我的评论</a></h4></li>                                                        
        </ul>
        <div class="curcatbt">
        </div>
    </div>
</div>
            <div class="right">
                <div style="background:#f1f1f1; margin-top:5px">
                    <a href="<?php echo U('User/ucenter',array('option'=>selfaddress));?>" class="easyui-linkbutton" data-options="iconCls:'icon-book_addresses'" style="margin:10px 10px">返回管理地址</a>
                </div>
                <form name="f1" action="<?php echo U('User/ucenter',array('option'=>addaddress));?>" method="post" enctype="multipart/form-data">   
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>收货人</th><td colspan="3"><input type="hidden" name="users_id" value="<?php echo ($userid); ?>"/><input type="text" name="contact" class="ipt" style="width: 336px;"></td>
                    </tr>
                    <tr>
                        <th>详细地址</th><td colspan="3"><input type="text" name="address" class="ipt" style="width: 500px;"></td>
                    </tr>
                    <tr>
                        <th>电话</th><td style="width: 270px;"><input type="text" name="tel" class="ipt" style="width: 200px;"></td>
                        <th>手机</th><td><input type="text" name="phone" class="ipt" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <th>标志建筑</th><td style="width: 270px;"><input type="text" name="signbuild" class="ipt" style="width: 200px;"></td>
                        <th>最佳送货时间</th><td><input type="text" name="besttime" class="ipt" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding: 10px 0;">
                            <input type="submit" name="s1" value="提交" style="margin-left:340px;" />&nbsp;<input type="reset" name="r1" value="清除" /></td>
                    </tr>
                </table> 
            </form>  
            </div>
        </div>
        <div class="footer">
    <img src="__SKIN__images/index_77.gif" width="1000" height="282" alt="" />
</div>
    </body>
</html>