<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="__SKIN__css/left.css" rel="stylesheet" type="text/css"/>
        <link href="__SKIN__css/show.css" rel="stylesheet" type="text/css"/>
        <link href="__SKIN__css/header.css" rel="stylesheet" type="text/css" />
        <link href="__SKIN__css/reset.css" rel="stylesheet" type="text/css" />
        <script src="__SKIN__js/jq.js" type="text/javascript"></script>
        <script src="__SKIN__js/left.js" type="text/javascript"></script>
        <script src="__SKIN__js/show.js" type="text/javascript"></script>
        <title><?php echo ($gooddata[goodsname]); ?>-<?php echo ($CATEGORY[catename]); ?>-3C商城</title>
        <script>
            function myminus() {
                var _googsnum = parseInt($('#goodsnum').val()) - 1;
                if (_googsnum > 0) {
                    $('#goodsnum').val(_googsnum);
                }
            }
            function myadd() {
                var _googsnum = parseInt($('#goodsnum').val()) + 1;
                if (_googsnum > 0) {
                    $('#goodsnum').val(_googsnum);
                }
            }
            function gotoshopcar() {
                var _form = document.getElementById('myform');
                _form.submit();
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
        <!--当前位置开始-->
        <div class="position">
            <h6>当前位置：</h6><a href="__APPURL__">首页</a>
            <?php if(is_array($pos)): $i = 0; $__LIST__ = $pos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><span> &gt; </span><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>"><?php echo ($item[catename]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--当前位置结束-->
        <!--页面主要区域开始-->
        <div class="main">
            <!--右侧区域开始-->
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
                    <?php else: ?>
                        <li class="item"><div class="icons" style="background-position:0 <?php echo ($key*-50+50); ?>px" ></div><a href="<?php echo U('Index/show',array('goodid'=>$item[id]));?>"><?php echo ($item[goodsname]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                <div class="picshow">
                    <div id="demo">
                        <div class="mainpic">
                            <img src="__APPURL__Public/Uploads/<?php echo ($pics[0][picdir]); ?>thumb_350_350_<?php echo ($pics[0][picname]); ?>" width="350" height="350"/>
                            <div id="mask"></div>
                            <div id="bigmask"></div>
                        </div>
                        <div id="bigpic">
                            <img src="__APPURL__Public/Uploads/<?php echo ($pics[0][picdir]); ?>thumb_800_800_<?php echo ($pics[0][picname]); ?>"  width="800" height="800"/>
                        </div>
                    </div>
                    <div class="picnav">
                        <a href="javascript:void(0)" class="arrow1"></a>
                        <div class="scrollpic">
                            <ul style="left:0">
                                <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><img src="__APPURL__Public/Uploads/<?php echo ($item[picdir]); ?>thumb_64_64_<?php echo ($item[picname]); ?>" width="64" height="64" id="<?php echo ($item[picname]); ?>" name="<?php echo ($item[picdir]); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <a href="javascript:void(0)"  class="arrow2"></a>
                    </div>
                </div>
                <div class="info">
                    <h3><?php echo ($gooddata[brandname]); ?>：<?php echo ($gooddata[goodsname]); ?></h3>
                    <div class="info1">
                        <ul>
                            <li>商品编号：<?php echo ($gooddata[id]); ?></li>
                            <li>市场价格：￥<?php echo ($gooddata[mprice]); ?></li>
                            <li>商城价格：<span class="red">￥<?php echo ($gooddata[price]); ?></span>为您节省<span class="red">￥<?php echo ($gooddata[mprice]-$gooddata[price]); ?></span></li>
                        </ul>
                    </div>
                    <div class="info2">
                        <ul>
                            <li>库存：<span class="red"><?php echo ($gooddata[storenum]); ?></span></li>
                            <?php if(is_array($attrlist)): $i = 0; $__LIST__ = $attrlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><?php echo ($item[name]); ?>： <?php echo ($item[val]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <form name="f1" id="myform" action="<?php echo U('shopcar/addshopcar');?>" method="post">
                        <input type="hidden" name="goods_id" value="<?php echo ($gooddata[id]); ?>"/>
                        <div class="info3">
                            <span class="red">购买数量</span>
                            <a href="javascript:void(0)" class="minus" onclick="myminus()"><img src="__SKIN__/images/show_13.jpg" width="15" height="15" /></a>
                            <input type="text" name="num" id="goodsnum" value="1" style="width:50px;"/>
                            <a href="javascript:void(0)" class="add" onclick="myadd()"><img src="__SKIN__/images/show_15.jpg" width="15" height="15" /></a>
                        </div>
                    <a href="javascript:void(0)" onclick="gotoshopcar()" class="buy"><img src="__SKIN__/images/show_20.jpg" /></a>
                    </form> 
                </div>
                <div class="clear"></div>
                <div class="detail">
                    <div class="detail1">
                        <ul>
                            <li><img src="__SKIN__images/show_31.jpg" height="34" alt="" /></li>
                            <li><img src="__SKIN__images/show_33.jpg" height="34" alt="" /></li>
                        </ul>
                        <div class="content">
                            <div class="tabcontent">
                                <?php echo ($gooddata[goodpra]); ?>
                            </div>
                            <div class="tabcontent">
                                <?php echo ($gooddata[goodsinfo]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a name="comments"></a>
                <div class="comments">
                    <h3>评论列表</h3>
                    <ul>
                        <?php if(is_array($commentdata)): $i = 0; $__LIST__ = $commentdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commentitem): $mod = ($i % 2 );++$i;?><li>
                                <div class="commentitem">
                                    <h4>用户：<?php echo ($commentitem[username]); ?></h4>
                                    <div class="commentcontent">
                                        <?php echo ($commentitem[content]); ?>  
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div id="page" style="margin-top:10px"><?php echo ($pageshow); ?></div>
                    <div class="clear"></div>
                </div>
                <div class="comment">
                    <form action="<?php echo U('User/addcomment');?>" method="post">
                        <h3>我要评论</h3>
                        <input type="hidden" name="goodid" value="<?php echo ($gooddata[id]); ?>" />
                        <textarea name="content" id="" cols="90" rows="7"></textarea>
                        <div style="text-align:left; padding:10px">
                            <input type="submit" name="s1" value="提交">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--右侧区域结束-->
        <!--页面主要区域结束-->
        <div class="footer">
    <img src="__SKIN__images/index_77.gif" width="1000" height="282" alt="" />
</div>
        </div>
    </body>
</html>