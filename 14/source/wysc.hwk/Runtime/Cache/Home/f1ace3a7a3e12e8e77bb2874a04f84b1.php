<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="__SKIN__css/list.css" rel="stylesheet" type="text/css"/>
        <link href="__SKIN__css/left.css" rel="stylesheet" type="text/css"/>
        <link href="__SKIN__css/header.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/reset.css" rel="stylesheet" type="text/css" />
        <script src="__SKIN__js/jq.js" type="text/javascript"></script>
        <script src="__SKIN__js/left.js" type="text/javascript"></script>
        <script src="__SKIN__js/list.js" type="text/javascript"></script>
        <title>商标列表-3C商城</title>
    </head>
    <body>
        <!--顶部导航开始-->
<div class="mini-nav">
    <div class="mini-main">
        <div class="fast-nav">
            <a href="">登陆</a> | <a href="">免费注册</a> | <a href="">会员中心</a> 
            | <a href="">购物车</a> | <a href="">帮助中心</a>
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
            <h1><a href=""><img src="__SKIN__images/index_03.jpg" alt="" /></a></h1>
            <div class="searchform">
                <div class="form">
                    <form name="f1" method="post" action="<?php echo U('Index/seach');?>">
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
        <!--当前位置开始-->
        <div class="position">
            <h6>当前位置：</h6><a href="__APPURL__">首页</a>
            <span>&gt;</span><a href="javascript:void(0)">商标列表</a>
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
                        <li class="item"><div class="icons"></div><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
            <li class="topm10">
                <a href=""><img src="__SKIN__images/list_161.jpg" width="58" height="58" alt="" /></a>
                <a href="" class="goodinfo"><span>凯力家用智能吸尘清洁机</span>
                    <div class="price">
                        ￥100.00
                    </div>
                </a>
                <div class="clear"></div>
            </li>
            <li class="topm10">
                <a href=""><img src="__SKIN__images/list_161.jpg" width="58" height="58" alt="" /></a>
                <a href="" class="goodinfo"><span>凯力家用智能吸尘清洁机</span>
                    <div class="price">
                        ￥100.00
                    </div>
                </a>
                <div class="clear"></div>
            </li>
            <li class="topm10">
                <a href=""><img src="__SKIN__images/list_161.jpg" width="58" height="58" alt="" /></a>
                <a href="" class="goodinfo"><span>凯力家用智能吸尘清洁机</span>
                    <div class="price">
                        ￥100.00
                    </div>
                </a>
                <div class="clear"></div>
            </li>
            <li class="topm10">
                <a href=""><img src="__SKIN__images/list_161.jpg" width="58" height="58" alt="" /></a>
                <a href="" class="goodinfo"><span>凯力家用智能吸尘清洁机</span>
                    <div class="price">
                        ￥100.00
                    </div>
                </a>
                <div class="clear"></div>
            </li>
            <div class="clear"></div>
        </ul>
        <div class="curcatbt">
        </div>
    </div>
    <!--浏览记录结束-->
</div>
            <div class="right">
                <!--热卖推荐开始-->
                <div class="recommend">
                    <?php if(is_array($xptj)): $i = 0; $__LIST__ = $xptj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="item">
                            <div class="itempic">
                                <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="88" height="60" alt="" /></a>
                            </div>
                            <div class="iteminfo">
                                <p><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></p>
                                <div class="price">￥<?php echo ($item[price]); ?></div>
                                <a href=""><img src="__SKIN__images/list_14.jpg" alt="" /></a>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!--热卖推荐结束-->
                <div class="clear"></div>
                <!--商品列表开始-->
                <div class="list" style="margin-top:10px">
                    <div class="sum"></div>
                    <?php if(is_array($branddata)): $i = 0; $__LIST__ = $branddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="gooditem" style="height:90px;margin-top:35px">
                            <a href="<?php echo U('Index/brandlist',array('brandid'=>$item[id]));?>">
                                <img src='
                                     <?php if($item[image]): ?>__APPURL__/Public/Uploads/<?php echo ($item[image]); ?>
                                     <?php else: ?>
                                     __SKIN__/images/nopic.png<?php endif; ?>
                                     ' width="140" height="80" style="width:140px; height:80px;" class="goodpic"
                                     />
                            </a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="clear"></div>
                <div id="page">
                    <?php echo ($pageshow); ?>
                </div>
                <!--商品列表结束-->
            </div>
        </div>
        <!--页面主要区域结束-->
        <div class="footer">
    <img src="__SKIN__images/index_77.gif" width="1000" height="282" alt="" />
</div>
        </div>
    </body>
</html>