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
        <title>
            <?php if($CATEGORY[catename]): echo ($CATEGORY[catname]); ?>
                <?php elseif($brandid): ?>
                <?php echo ($branddata[0][brandname]); ?>
                <?php elseif($keyword): ?>
                搜索“<?php echo ($keyword); ?>”<?php endif; ?>
            -3C商城
        </title>
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
        <!--当前位置开始-->
        <div class="position">
            <h6>当前位置：</h6><a href="__APPURL__">首页</a>
            <?php if($catid): if(is_array($pos)): $i = 0; $__LIST__ = $pos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><span> &gt; </span><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>"><?php echo ($item[catename]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php elseif($typeid): ?> 
                <span> &gt; </span><a href="<?php echo U('Index/lists',array('typeid'=>$typeid));?>"><?php echo ($typedata[typename]); ?></a>
                <?php elseif($brandid): ?>
                <span>&gt;</span><?php echo ($branddata[0][brandname]); ?>
                <?php elseif($keyword): ?>
                <span>&gt;</span>搜索“<?php echo ($keyword); ?>”<?php endif; ?>
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
                                <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="__SKIN__images/list_14.jpg" alt="" /></a>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!--热卖推荐结束-->
                <div class="filter">
                    <h3>商品筛选</h3>
                    <dl>
                        <dt>价格：</dt>
                        <dd><a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'keyword'=>$keyword));?>">全部</a></dd>
                        <?php if(is_array($pricerange)): $i = 0; $__LIST__ = $pricerange;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$range): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$range[gt],'lt'=>$range[lt],'brand'=>$brandid,'keyword'=>$keyword));?>"><?php echo ($range[text]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <div class="clear"></div>
                    <dl class="brand">
                        <dt>品牌：</dt>
                        <dd><a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$range[gt],'lt'=>$range[lt],'order'=>$order,'keyword'=>$keyword));?>">全部</a></dd>
                        <?php if(is_array($branddata)): $i = 0; $__LIST__ = $branddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$gt,'lt'=>$lt,'brand'=>$brand[id],'order'=>$order,'keyword'=>$keyword));?>"><img src="__APPURL__Public/Uploads/<?php echo ($brand[image]); ?>" height="50" width="70"/></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        <div class="clear"></div>
                    </dl>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <!--商品列表开始-->
                <div class="order">
                    <h3>排序</h3><a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$gt,'lt'=>$lt,'brand'=>$brandid,'order'=>'iddesc','keyword'=>$keyword));?>">
                        <?php if($order == 'iddesc'): ?><img src="__SKIN__images/list_25.jpg" />
                            <?php else: ?>
                            <img src="__SKIN__images/list17.jpg" /><?php endif; ?>
                    </a>
                    <a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$gt,'lt'=>$lt,'brand'=>$brandid,'order'=>'idasc','keyword'=>$keyword));?>">
                        <?php if($order == 'idasc'): ?><img src="__SKIN__images/list_25.jpg" />
                            <?php else: ?>
                            <img src="__SKIN__images/list18.jpg" /><?php endif; ?>
                    </a>
                    <a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$gt,'lt'=>$lt,'brand'=>$brandid,'order'=>'pricedesc','keyword'=>$keyword));?>">
                        <?php if($order == 'pricedesc'): ?><img src="__SKIN__images/list_25.jpg" />
                            <?php else: ?>
                            <img src="__SKIN__images/list15.jpg" /><?php endif; ?>
                    </a>
                    <a href="<?php echo U('Index/'.$myaction,array('catid'=>$catid,'typeid'=>$typeid,'gt'=>$gt,'lt'=>$lt,'brand'=>$brandid,'order'=>'priceasc','keyword'=>$keyword));?>">
                        <?php if($order == 'priceasc'): ?><img src="__SKIN__images/list16.jpg" />
                            <?php else: ?>
                            <img src="__SKIN__images/list_27.jpg" /><?php endif; ?>
                    </a>
                </div>
                <div class="list">
                    <div class="sum">
                        共有<?php echo ($count); ?>件商品
                    </div>
                    <?php if(is_array($goodsdata)): $i = 0; $__LIST__ = $goodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="gooditem">
                            <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src='
                                                                                         <?php if($item[thumb]): ?>__APPURL__/Public/Uploads/<?php echo ($item[thumb]); ?>
                                                                                         <?php else: ?>
                                                                                         __SKIN__/images/nopic.png<?php endif; ?>
                                                                                         ' width="160" height="160" class="goodpic" alt="" /></a>
                            <div class="goodname">
                                <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[brandname]); ?>:<?php echo ($item[goodsname]); ?></a>
                            </div>
                            <div class="goodprice">
                                市场价格：￥<?php echo ($item[mprice]); ?>
                            </div>
                            <div class="goodprice1">
                                商城价格：￥<?php echo ($item[price]); ?>
                            </div>
                            <div class="op">
                                <a href="<?php echo U('User/addfavor',array('goodsid'=>$item[id]));?>"><img src="__SKIN__images/list_49.jpg" width="70" height="26" alt="" /></a>
                                <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="__SKIN__images/list_51.jpg" width="70" height="26" alt="" /></a>
                            </div>
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