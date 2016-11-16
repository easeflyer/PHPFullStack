<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="__PUBLIC__/home/css/myCart_style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!------------头部------------->
        <div id="shortcut">
            <div class="w">
                <ul>
                    <li class="fore1" id="loginfo">您好！欢迎来到京东商城！<span><a href="#">[请登录]</a>，新用户<a href="#" class="link-regist">[免费注册]</a></span></li>
                    <li class="fore2"><a href="#">我的订单</a></li>

                    <li><a href="#">我的京东</a></li>
                    <li><a href="#">装机大师</a></li>
                    <li><a href="#">礼品卡</a></li>
                    <li><a href="#">企业客户</a></li>
                    <li class="sub"><b></b>帮助中心</li>
                </ul>
            </div>
        </div>

        <div id="bodyPart">
            <div id="top">
                <div id="logo"></div>
                <div id="Cart">
                    <ul>
                        <li id="myCart" class="white">1.我的购物车</li>
                        <li id="writeInfo">2.填写核对订单信息</li>
                        <li id="successSub">3.成功提交订单</li>				
                    </ul>
                </div>
            </div>
            <div id="top_myCart"></div>
            <div class="List_cart">
                <h2>
                    <strong>我挑选的商品</strong>
                </h2>
                <div class="cart_table">
                    <table id="CartTb" cellpadding="0" cellspacing="0" width="600">
                        <tr class="align_Right">
                            <td>商品编号</td>
                            <td>商品名称</td>
                            <td>京东价</td>
                            <td>返现</td>
                            <td>赠送积分</td>
                            <td>商品数量</td>
                            <td>删除商品</td>
                        </tr>
                        <?php if(is_array($rs)): foreach($rs as $key=>$val): ?><tr>
                                <td><?php echo ($val["bCode"]); ?></td>
                                <td id="align_Left">
                                    <div id="c_img"><a href="#"><img src="__ROOT__/<?php echo ($val["bImg"]); ?>" width="25" height="30"></a></div>
                                    <div id="c_info"><span><a href="#"><?php echo ($val["bName"]); ?></a></span><br></div>
                                </td>
                                <td class="price">￥<?php echo ($val["bJDprice"]); ?></td>
                                <td>￥0.00</td>
                                <td>0</td>
                                <td width="70">
                                    <div id="eqNum">
                                        <ul>
                                            <li class="Img"><img src="__PUBLIC__/home/img/bag_close.gif"></li>
                                            <li><input type="text"  value="<?php echo ($val["caCount"]); ?>" id="num" ></li>
                                            <li class="Img"><img src="__PUBLIC__/home/img/bag_open.gif"></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>删除</td>
                            </tr><?php endforeach; endif; ?>


                        <tr>
                            <td colspan="7" class="align_Right" height="40">重量总计：1.08kg&nbsp;&nbsp;&nbsp;原始金额：￥<?php echo ($pc); ?>元 - 返现：￥0.00元<br><span style="font-size: 14px;"><b>商品总金额(不含运费)：<span id="cartBottom_price" class="price">￥<?php echo ($pc); ?></span>元</b></span></td>
                        </tr>
                    </table>
                    <div id="cart_op">
                        <ul>
                            <li id="li1">寄存购物车</li>
                            <li id="li2">清空购物车</li>
                            <li id="li3">凑单商品</li>
                            <li id="li4">
                                <a href="__URL__/ckLogin"><img src="__PUBLIC__/home/img/checkout.jpg"></a>
                            </li>
                        </ul>
                    </div>

                    <div id="ybPanel">
                        <div class="yb">
                            <div class="yb_c">
                                <h3 style="font-size: 13px;">购买延保服务 - 保修时间更长，使用更安心！<a class="link_1" href="#">查看保修范围</a></h3>

                                <div>惠普（HP） CB350 数码相机（蓝色订制版）：<br>
                                        <div><a href="#" >延保通 数码相机/摄像机 保修二年 特有多项意外保障</a><em class="font1"></em>，仅需<strong class="font1">￥69.00</strong>&nbsp;&nbsp;<a href="#"><img src="__PUBLIC__/home/img/btn_20.gif"></a>
                                        </div>					
                                </div><br>

                            </div>	
                        </div>
                    </div>


                </div><!---cart_table--->
            </div>

            <div class="List_cart t">
                <h2>
                    <strong>我收藏的商品<span id="smallSize">(现在就放入购物车吧！)</span><span id="extra">进入收藏夹>></span></strong>
                </h2>
                <div id="notFav">
                    您还未收藏任何商品...
                </div>
            </div>
            <div id="help">
                帮我们改进购物车	</div>	
        </div>
        <div id="footer">
            <div class="flinks"><a href="#">关于我们</a>|<a href="#">联系我们</a>|<a href="#">人才招聘</a>|<a href="#">商家入驻</a>|<a href="#">广告服务</a>|<a href="#">京东社区</a>|<a href="#">友情链接</a>|<a href="#">销售联盟</a></div>
            <div class="copyright">北京市公安局海淀分局备案编号：1101081681&nbsp;&nbsp;京ICP证070359号&nbsp;&nbsp;<a target="_blank" href="__PUBLIC__/home/img/f_music.jpg">音像制品经营许可证苏宿批005 号</a><br>Copyright&copy;2004-2011&nbsp;&nbsp;360buy京东商城&nbsp;版权所有</div>
            <div class="ilinks"><a href="#">
                    <img width="108" height="40" src="__PUBLIC__/home/img/f_icp.gif"></a>
                <a id="urlknet"href="#"><img width="112" height="40" border="true" src="__PUBLIC__/home/img/knetSealLogo.jpg"></a>
            </div>
        </div>

    </body>
</html>