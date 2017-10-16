<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo ($data[title]); ?>-<?php echo ($data[catname]); ?>-3C商城</title>
        <link href="__SKIN__css/left.css" type="text/css" rel="stylesheet"/>
        <link href="__SKIN__css/show.css" type="text/css" rel="stylesheet"/>
        <link href="__SKIN__css/header.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/reset.css" rel="stylesheet" type="text/css" />
        <script src="__SKIN__js/jq.js" type="text/javascript"></script>
        <script src="__SKIN__js/left.js" type="text/javascript"></script>
        <style>
            .main-right *{color: #666666;}
            .newstitle{font-size: 14px;text-align: center;height: 2em;line-height: 2em;color: #666666;border-bottom:1px dotted #ccc;padding-bottom: 10px;}
            .addtime{height: 2em;line-height: 2em;text-align: right;padding-right: 20px; font-size: 12px}
            .newscontent{font-size: 14px; line-height: 2em; padding: 20px;}
        </style>
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
            <h6>当前位置：</h6><a href="__APPURL__">首页</a>
            <span>&gt;</span><a href="<?php echo U('News/lists',array('catid'=>$data[newscate_id]));?>"> <?php echo ($data[catname]); ?></a>
        </div>
        <!--当前位置结束--> 
        <!--页面主要区域开始--> 
        <div class="main">
            <div class="left">
    <!--当前分类开始-->
    <div class="currencat">
        <h3><span><?php echo (($CAT[catename])?($CAT[catename]):'全部分类'); ?></span></h3>
        <ul class="cat">
            <?php if(is_array($childs)): $i = 0; $__LIST__ = $childs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li class="item current"><h4><div class="icon"></div><?php echo ($child[catename]); ?></h4>
                    <ul class="subcat">
                        <?php if(is_array($child[children])): $i = 0; $__LIST__ = $child[children];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subchild): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($subchild[catename]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="clear"></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="curcatbt">
        </div>
    </div>
    <!--当前分类结束-->
    <!--热销商品开始-->
    <div class="hotgoods">
        <h3><span>热卖商品</span></h3>
        <ul>
            <?php if(is_array($rmsp)): $k = 0; $__LIST__ = $rmsp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k; if($k == 1): ?><li class="top">
                        <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="58" height="58" alt="" /></a>
                        <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>" class="goodinfo"><span><?php echo ($item[goodsname]); ?></span>
                            <div class="price">
                                ￥<?php echo ($item[price]); ?>
                            </div>
                        </a>
                        <div class="clear"></div>
                    </li>
                    <else>
                        <li class="item"><div class="icons" style=" background-position:0 <?php echo ($key*-50+50); ?>px" ></div><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <div class="clear"></div>
        </ul>
        <div class="curcatbt">
        </div>
    </div>
    <!--热销商品结束-->
    <!--浏览记录开始-->
    <div class="hotgoods">
        <h3><span>浏览记录</span></h3>
        <ul style="padding-top:1px;">
            <?php if(is_array($viewhistory)): $i = 0; $__LIST__ = $viewhistory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="topm10">
                    <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="
                        <?php if($item[thumb]): ?>__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>
                        <?php else: ?>
                        __SKIN__images/nopic.png<?php endif; ?>
                        " width="58" height="58" alt="" /></a>
                    <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>" class="goodinfo"><span><?php echo (mb_substr($item[goodsname],0,30,'utf-8')); ?></span>
                        <div class="price">
                            ￥<?php echo ($item[price]); ?>
                        </div>
                    </a>
                    <div class="clear"></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="clear"></div>
        </ul>
        <div class="curcatbt">
        </div>
    </div>
    <!--浏览记录结束-->
</div>
            <!--右边部分开始-->
            <div class="right">
                <h3 class="newstitle"><?php echo ($data[title]); ?></h3>
                <div class="addtime">
                    【发布时间：<?php echo (date('Y-m-d H:i:s',$data[addtime])); ?>】
                </div>
                <div class="newscontent">
                    <?php echo ($data[content]); ?>
                </div>
            </div>
            <!--右边部分结束-->
        </div>
        <!--页面主要区域结束--> 
        <div class="footer">
    <img src="__SKIN__images/index_77.gif" width="1000" height="282" alt="" />
</div>
        </div>
    </body>
</html>