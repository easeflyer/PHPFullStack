<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>首页-3C商城</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__css/index.css" />


    </head>

    <body>
        <!--头部 全部分类 菜单以上部分 部分变量渲染-->
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

        <script type="text/javascript" src="__SKIN__js/index.js"></script>
        <!--顶部导航开始-->
        
        <!--第一屏开始  通栏广告以上部分-->
        <div class="sec1">
            <div class="left">
                <ul class="menu"> 
                    <!--左侧的动态菜单
                     利用 三个 volist 输出 3级分类
                    调用数据 catdata
                    
                    -->
                    <?php if(is_array($catdata)): $i = 0; $__LIST__ = $catdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="menuitem"><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>">li<?php echo ($item[catname]); ?><span class="mask"></span></a>
                            <div class="submenu">
                                <?php if(is_array($item[children])): $i = 0; $__LIST__ = $item[children];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subitem): $mod = ($i % 2 );++$i;?><dl>
                                        <dt><a href="<?php echo U('Index/lists',array('catid'=>$subitem[id]));?>">dt<?php echo ($subitem[catname]); ?></a></dt>
                                        <?php if(is_array($subitem[children])): $i = 0; $__LIST__ = $subitem[children];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subsubitem): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/lists',array('catid'=>$subsubitem[id]));?>">dd<?php echo ($subsubitem[catname]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <div class="clear">
                                        </div>
                                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <!--动态菜单结束 ，图片轮换 -->
            <div class="main">
                <div class="main-top">
                    <!--大图 图片轮换 集合 index.js index.css-->
                    <div class="pic">
                        <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="590" height="220" /><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <!--图片轮换按钮-->
                    <ul class="imagenav">
                        <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/show',array('newsid'=>$item[id]));?>"><span>pics<?php echo ($item[title]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="main-bottom">
                    <div class="btn-right">
                    </div>
                    <div class="btn-left">
                    </div>
                    <div class="scrollpic">
                        <ul class="piclist" style="left:0px">
                            <?php if(is_array($rxsp)): $i = 0; $__LIST__ = $rxsp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($item[thumb]); ?>" width="125" height="160" /></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <div class="right">
                <div class="ad1">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad1[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad1[thumb]); ?>" width="190" height="123" /></a>
                </div>
                <div class="login">
                    <a href="<?php echo U('User/login');?>"><img src="__SKIN__images/index_41.gif" /></a>
                    <a href="<?php echo U('User/register');?>"><img src="__SKIN__images/index_39.jpg" /></a>
                </div>
                <div class="ad2">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad2[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad2[thumb]); ?>"  width="190" height="195" /></a>
                </div>
            </div>
        </div>
        <!--第一屏结束-->
        
        
        <!--广告-->
        <div class="ad3">
            <a href="<?php echo U('News/show',array('newsid'=>$ad3[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad3[thumb]); ?>" width="1000" height="90" /></a>
        </div>
        <!--广告结束-->
        <!--商品列表开始-->
        <div class="goodlist">
            <div class="goodtitle">
                <span class="more"><a href="<?php echo U('Index/lists',array('typeid'=>2));?>">更多</a></span>
                <h3>
                    <a href="">最新上架</a>
                </h3>
            </div>
            <div class="ad4">
                <div class="adpic">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad4[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad4[thumb]); ?>" width="200" height="220" /></a>
                </div>
            </div>
            <ul class="goods">
                <?php if(is_array($zxsj)): $i = 0; $__LIST__ = $zxsj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                        <div class="goodpic">
                            <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>">
                                <img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="120" height="140" />
                            </a>
                        </div>
                        <h4><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></h4>
                        <p class="pprice">￥<?php echo ($item[mprice]); ?></p>
                        <p class="price">￥<?php echo ($item[price]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="goodlist">
            <div class="goodtitle">
                <span class="more"><a href="<?php echo U('Index/lists',array('typeid'=>3));?>">更多</a></span>
                <h3>
                    <a href="">新品推荐</a>
                </h3>
            </div>
            <div class="ad4">
                <div class="adpic">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad4[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad4[thumb]); ?>" width="200" height="220" /></a>
                </div>
            </div>
            <ul class="goods">
                <?php if(is_array($xptj)): $i = 0; $__LIST__ = $xptj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                        <div class="goodpic">
                            <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>">
                                <img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="120" height="140" />
                            </a>
                        </div>
                        <h4><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></h4>
                        <p class="pprice">￥<?php echo ($item[mprice]); ?></p>
                        <p class="price">￥<?php echo ($item[price]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="goodlist">
            <div class="goodtitle">
                <span class="more"><a href="<?php echo U('Index/lists',array('catid'=>1));?>">更多</a></span>
                <h3>
                    <a href="">大家电</a>
                </h3>
            </div>
            <div class="ad4">
                <div class="adpic">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad4[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad4[thumb]); ?>" width="200" height="220" /></a>
                </div>
            </div>
            <ul class="goods">
                <?php if(is_array($djd)): $i = 0; $__LIST__ = $djd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                        <div class="goodpic">
                            <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>">
                                <img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="120" height="140" />
                            </a>
                        </div>
                        <h4><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></h4>
                        <p class="pprice">￥<?php echo ($item[mprice]); ?></p>
                        <p class="price">￥<?php echo ($item[price]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="goodlist">
            <div class="goodtitle">
                <span class="more"><a href="<?php echo U('Index/lists',array('catid'=>7));?>">更多</a></span>
                <h3>
                    <a href="">图书</a>
                </h3>
            </div>
            <div class="ad4">
                <div class="adpic">
                    <a href="<?php echo U('News/show',array('newsid'=>$ad4[id]));?>"><img src="__APPURL__/Public/Uploads/<?php echo ($ad4[thumb]); ?>" width="200" height="220" /></a>
                </div>
            </div>
            <ul class="goods">
                <?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                        <div class="goodpic">
                            <a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>">
                                <img src="__APPURL__Public/Uploads/<?php echo ($item[thumb]); ?>" width="120" height="140" />
                            </a>
                        </div>
                        <h4><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></h4>
                        <p class="pprice">￥<?php echo ($item[mprice]); ?></p>
                        <p class="price">￥<?php echo ($item[price]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="brand">
            <ul>
                <?php if(is_array($branddata)): $i = 0; $__LIST__ = $branddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('Index/brandlist',array('brandid'=>$item[id]));?>"><img src="__APPURL__Public/Uploads/<?php echo ($item[image]); ?>" alt="" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="clear">
            </div>
            <div class="morebrand">
                <span><a href="<?php echo U('Index/allbrand');?>">更多品牌</a></span>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="footer">
<img src="__SKIN__images/index_77.gif" width="1000" height="282" />
</div>
        <!--商品列表结束-->
        </div>
    </body>

</html>