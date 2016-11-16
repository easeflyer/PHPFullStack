<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/book.css" />
</head>

<body id="book">
<!--快捷访问栏开始-->
<div id="shortcut">
	<div class="page_width">
		<ul>
			<li class="welcome">您好！欢迎来到京东商城！<span><a href="#">[请登录]</a>，新用户？<a href="#" class="link_reg">[免费注册]</a></span></li>
			<li class="my_order"><a href="#">我的订单</a></li>
			<li><a href="#">我的京东</a></li>
			<li><a href="#" target="_blank">装机大师</a></li>
			<li><a href="#" target="_blank">礼品卡</a></li>
			<li><a href="#" target="_blank">企业客户</a></li>
			<li class="sub">
                <a href="#" target="_blank">帮助中心</a>
            </li>
		</ul>
		<span class="clear"></span>
	</div>
</div>
<!--头部导航开始-->
<div id="header" class="page_width">
	<div id="logo">
    	<a href="#"><img src="__PUBLIC__/home/images/logo.gif"width="251" height="46"/></a>
    </div>
    <div id="nav">
    	<div id="nav_index"><a href="#">首页</a></div>
        <div id="nav_curr"><a href="#">图书</a></div>
        <div id="nav_ext">
        	<ul>
            	<li id="nav_brand" class="ext_first"><a href="#">品牌直销</a></li>
                <li id="nav_tuan"><a href="#">团购</a></li>
                <li id="nav_auction"><a href="#">夺宝岛</a></li>
                <li id="nav_read"><a href="#">在线读书</a></li>
                <li id="nav_club"><a href="#">京东社区</a></li>
                <li id="nav_category"><a href="#">全部分类</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div id="book_search">
    	<div id="allsort">
        	<div id="more_sort">
        		<strong>全部商品分类</strong>
        		<div id="extra">&nbsp;</div>
            </div>
        </div>
        <div id="search">
        	<div id="sub_search">
            	<input type="text" id="keyword" value="男孩" onfocus="this.value=''" onblur="this.value='男孩'" />
            </div>
            <input type="submit" id="btn_search" value="搜 索"/>
        </div>
        <div id="advance">高级搜索
        </div>
        <ul id="mycart">
        	<li id="cart_info">购物车<b><font color="#066FC9">0</font></b>件</li>
            <li><font color="#ffffff">去结算</font></li>
        </ul>
    </div>
    <div id="hot_words">
    	<div id="left_corner"></div>
        <div id="words">
		<?php if(is_array($rs)): foreach($rs as $key=>$val): ?><a href="__URL__/booksList/cId/<?php echo ($val["cId"]); ?>"><?php echo ($val["cName"]); ?></a>&nbsp;|&nbsp;<?php endforeach; endif; ?>
		所有图书分类
		</div>
        <div id="right_corner"></div>
    </div>
</div>
<!--头部导航结束-->
<div class="clear"></div>
<!--主体main部分开始-->
<div class="main page_width">
	<!--左边部分开始-->
	<div id="left">
    	<div id="book_sort">
        	<div class="sort_title">
            	<h2>图书分类</h2>
            </div>
            <div class="sort_list">
			<?php if(is_array($rs)): foreach($rs as $key=>$val): ?><div class='item'>
                	<h3><b>&gt;</b><a href='__URL__/booksList/cId/<?php echo ($val["cId"]); ?>' class="dot"> <?php echo ($val["cName"]); ?></a></h3>
                </div><?php endforeach; endif; ?>
                
                <div class="all_item"><a href="#">全部图书分类&gt;&gt;</a></div>
            </div>          
        </div>
        
        <div id="publishers">
        	<div class="book_title">
				<h2>品牌出版商<br /><span>Top Publishers</span></h2>
			</div>
            <div class="pic_link">
					<?php if(is_array($rs_1)): foreach($rs_1 as $key=>$v1): ?><div class="pub_pic">
                    	<a href="#"><img src="__ROOT__/<?php echo ($v1["pLogo"]); ?>"/></a>
                       </div><?php endforeach; endif; ?>
			</div>
            <ul>
				<?php if(is_array($rs_2)): foreach($rs_2 as $key=>$v2): ?><li class='fore'><a href='#' target="_blank"><?php echo ($v2["pName"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        
        <div id="reader_recommend">
			<div class="book_title">
				<h2>网友荐书<br /><span>Shoppers Recommendations</span></h2>
			</div>
			<div class="book_info">					
                <div class="book_pic">
                    <div class=""><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_05.jpg"/></a></div>
                </div>
                <div class="book_text">
                    <div class="book_name"><a href="#" target="_blank"><font color="#FF0000">为了报仇看电影</font></a></div>
                    <div class="book_intr">　　本书由韩松落的电影随笔结集而成。<br> ...</div>
                    <div class="book_more"><a href="#" target="_blank">深度了解&gt;&gt;</a></div>
                </div>	
			</div>
		</div>
        
        <div id="hot_author">
			<div class="book_title">
				<h2>热门作者<br /><span>Popular Authors</span></h2>
				<div class="extra"></div>
			</div>
			<div class="author_rank">
                <ul class="fore">
                    <li class="fore1">排名</li>
                    <li class="fore2">作者</li>
                    <li class="fore3">搜索量</li>
				</ul>
				<ul>
                	<li class="fore1"><s class="equa"></s></li>
                    <li class="fore2"><a href="#"target="_blank">韩寒</a></li>
                    <li class="fore3">(24251)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">村上春树</a></li>
                    <li class="fore3">(23954)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">蔡康永</a></li>
                    <li class="fore3">(21087)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">麦家</a></li>
                    <li class="fore3">(20556)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="down"></s></li>
                    <li class="fore2"><a href="#"target="_blank">郎咸平</a></li>
                    <li class="fore3">(19201)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">白岩松</a></li>
                    <li class="fore3">(18447)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="down"></s></li>
                    <li class="fore2"><a href="#"target="_blank">龙应台</a></li>
                    <li class="fore3">(17264)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">李开复</a></li>
                    <li class="fore3">(15899)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="equa"></s></li>
                    <li class="fore2"><a href="#"target="_blank">丹·布朗</a></li>
                    <li class="fore3">(14237)</li>
                </ul>
				<ul>
                	<li class="fore1"><s class="up"></s></li>
                    <li class="fore2"><a href="#"target="_blank">郭敬明</a></li>
                    <li class="fore3">(10129)</li>
                </ul>
			</div>
		</div>
        
    </div>
    <!--左边部分结束-->
    
    <!--中间部分开始-->
    <div id="middle">
    	<div id="slide">
        	
            <div id="pfocus">
                <div id="pfocus_piclist">
                    <ul>
                        <li id="p0"><a href="#"><img src="__PUBLIC__/home/img/ad01.jpg" /></a></li>
                        <li id="p1"><a href="#"><img src="__PUBLIC__/home/img/ad02.jpg" /></a></li>
                        <li id="p2"><a href="#"><img src="__PUBLIC__/home/img/ad03.jpg" /></a></li>
                        <li id="p3"><a href="#"><img src="__PUBLIC__/home/img/ad04.jpg" /></a></li>
                        <li id="p4"><a href="#"><img src="__PUBLIC__/home/img/ad05.jpg" /></a></li>
                        <li id="p5"><a href="#"><img src="__PUBLIC__/home/img/ad06.jpg" /></a></li>
                    </ul>
                </div>
    			<div id="pfocus_btn">
                    <ul>
                        <li class="current" id="b0"><a href="#" class="textcolor">1</a></li>
                        <li id="b1"><a href="#">2</a></li>
                        <li id="b2"><a href="#">3</a></li>
                        <li id="b3"><a href="#">4</a></li>
                        <li id="b4"><a href="#">5</a></li>
                        <li id="b5"><a href="#">6</a></li>
                    </ul>
    			</div>
			</div>
        </div>
        
        <div id="focus">
        	<div class="mt">
				<h2>一种注目</h2>
				<ul class="tab">
        			<li class='curr'><span>货币战争3：金融高边疆</span></li>
                	<li><span>风语2</span></li><li><span>微博：改变一切</span></li>
                    <li><span>我在美国做妈妈：耶鲁法学院教授的育儿经</span></li>
				</ul>
			</div>
            <div class='view_content'>
	    	<div class="pic_content">
            	<a href='#' target="_blank"><img width="130" height="130" src="__PUBLIC__/home/img/book_07.jpg"></a>
            </div>
	    	<div class="pic_info">
		    	<div class="pic_name"><a href="#" target="_blank" style="font-size:14px;">货币战争3：金融高边疆</a></div>
		    	<div class="con">　　用一句话概括《货币战争3·金融高边疆》，那就是：以金融的视角解读中国近现代史。在前两部《货币战争》分别解读了美国和欧洲的金融发展史之后，宋鸿兵终于把目光投向了中国，以鸦片战争为起点，开始了对中国金融发展的探究和解密。<br>　　中国近百年的历史，从金融的视角看就是，谁能控制金融高边疆，谁就拥有了巨大的战略优势。而金融高边疆的崩溃最终必将导致政权的崩溃。<br>　　国家的边疆，不仅是由陆疆、海疆、空疆（包括太空）构成的三维物理空间，未来还需要包括第四维：金融高边疆。<br>　　英国金融资本的突击力量远比船坚炮利的帝国海军更具威力，他们首先打垮了中国的白银货币本位，抢占了中央银行这一金融战略制高点，渗透和蚕食了金融网络，掌握了清算体系，控制了金融市场，进而剥夺了清帝国的财政税收大权。在失去了对金融高边疆控制权的情况下，任何政治改革、军事自强、工业兴国的美好意图都只能是无法实现的梦想！大清帝国衰亡的最致命原因，就是金融高边疆的陷落！而日本明治维新的成功，恰恰在于西方列强无法攻破日本的金融高边疆。<br>　　在未来的世界货币战争中，巩固和强化金融高边疆将是大国博弈的主战场。人民币跨出国门之日，就是金融高边疆全球布局之时。在世界任何一个角落，哪里有人民币出现，哪里就是中国的金融高边疆必须覆盖的新领域，人民币的流通域有多大，中国的国家利益范围就有多大。<br>　　未来的国家利益之争，将首先且必然体现为货币的利益之争！
                </div>
		    	<div class="pic_price">
			    定价：<del>￥39.90</del>&nbsp;&nbsp;
			    会员价：<strong >￥20.90</strong>&nbsp;&nbsp;
			    京东价：<strong>￥22.00（55折）</strong>
		    	</div>
	    	</div>
    		</div>
        </div>
        <div class="ad_middle">
        	<div class="book_ad"><a href="#"><img src="__PUBLIC__/home/img/book_08.jpg" /></a></div>
            <div class="book_ad_right"><a href="#"><img src="__PUBLIC__/home/img/book_09.jpg" /></div>
        </div>
        
        <div class="clear"></div>
        
        <div id="new_books">
			<div class="book_tit">
				<h2><b style="font-size:16px;color:#289703;font-family: 'microsoft yahei',arial;">新书速递</b><br /><span>New Title Express</span></h2>
				<ul class="tab">	 
		  			<li class='curr'>1</li>	
                    <li >2</li>
                    <li >3</li>	
				</ul>
			</div>
	        <div class='book_content'>
				<ul class="pic_list">	
				<?php if(is_array($rs_3)): foreach($rs_3 as $key=>$v3): ?><li>
						<div class="pic_name"><a href="#" target="_blank"><?php echo ($v3["cName"]); ?></a></div>
						<div class="pic_book">
							<div class=""><a href="#"  target="_blank"><img src="__ROOT__/<?php echo ($v3["bImg"]); ?>" /></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank"><?php echo ($v3["bName"]); ?></a></div>
						<div class="pic_price">定价：<del>￥<?php echo ($v3["bMprice"]); ?></del></div>
						<div class="pic_price">会员价：<strong>￥<?php echo ($v3["bJDprice"]); ?></strong></div>
					</li><?php endforeach; endif; ?>
					
					
				</ul>
			</div>
       	</div>
        
        <div class="ad_middle"><a href="" target="_blank">
			<img height="120" width="546" src="__PUBLIC__/home/img/book_14.jpg"></a>
		</div>
        
        <div id="editor_recommend">
        	<div class="book_tit">
				<h2>编辑推荐<br /><span>Editor's Picks</span></h2>
			</div>
            <div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_15.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">中国海魂：从郑和到钓鱼岛</a>
                        </div>
						<div class="pic_price">定价：<del>￥38.00</del></div>
						<div class="pic_price">会员价：<strong>￥25.10</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_16.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">再见，出租屋</a></div>
						<div class="pic_price">定价：<del>￥28.00</del></div>
						<div class="pic_price">会员价：<strong>￥18.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_17.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">马云内部讲话</a></div>
						<div class="pic_price">定价：<del>￥28.00</del></div>
						<div class="pic_price">会员价：<strong>￥16.20</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_18.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">将才：让年轻人少奋斗5年</a></div>
						<div class="pic_price">定价：<del>￥25.80</del></div>
						<div class="pic_price">会员价：<strong>￥11.70</strong></div>
					</li>
				</ul>
			</div>
            
            <div>
				<ul class="text_list">
					<li><b></b><a href='#' target="_blank">坦白说，亲爱的</a></li>
					<li><b></b><a href='#' target="_blank">姥姥语录</a></li>
					<li><b></b><a href='#' target="_blank">净空法师《太上感应篇讲记》</a></li>
					<li><b></b><a href='#' target="_blank">孩子最喜欢和爸爸玩的99种游戏</a></li>
				</ul>
           </div>
           
           <div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_19.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_20.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_21.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_22.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
			</div>
            
            <div>
				<ul class="text_list">
					<li><b></b><a href='#' target="_blank">民国的政治逻辑</a></li>
					<li><b></b><a href='#' target="_blank">伤花怒放</a></li>
					<li><b></b><a href='#' target="_blank">2011中级会计资格：经济法</a></li>
					<li><b></b><a href='#' target="_blank">中日交流标准日本语：初级（上下）（新版）</a></li>
				</ul>
           </div>
           
        </div>
        
        
        <div id="book_children">
        	<div class="book_tit">
				<h2>美好书童<br /><span>Bestselling Children Books</span></h2>
                <div class="extra"><a href="#" target="_blank">进入少儿频道&gt;&gt;</a></div>
			</div>
            <div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_23.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">中国海魂：从郑和到钓鱼岛</a>
                        </div>
						<div class="pic_price">定价：<del>￥38.00</del></div>
						<div class="pic_price">会员价：<strong>￥25.10</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_24.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">再见，出租屋</a></div>
						<div class="pic_price">定价：<del>￥28.00</del></div>
						<div class="pic_price">会员价：<strong>￥18.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_25.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">马云内部讲话</a></div>
						<div class="pic_price">定价：<del>￥28.00</del></div>
						<div class="pic_price">会员价：<strong>￥16.20</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_26.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">将才：让年轻人少奋斗5年</a></div>
						<div class="pic_price">定价：<del>￥25.80</del></div>
						<div class="pic_price">会员价：<strong>￥11.70</strong></div>
					</li>
				</ul>
			</div>
           
           <div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_27.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_28.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_29.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_30.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
			</div>
            
            <div>
				<ul class="text_list">
					<li><b></b><a href='#' target="_blank">民国的政治逻辑</a></li>
					<li><b></b><a href='#' target="_blank">伤花怒放</a></li>
					<li><b></b><a href='#' target="_blank">2011中级会计资格：经济法</a></li>
					<li><b></b><a href='#' target="_blank">中日交流标准日本语：初级（上下）（新版）</a></li>
				</ul>
           </div>
           
        </div>
        
        <div class="" id="gallery">
			<div class="book_tit">
				<h2>主题馆<br /><span>Theme Gallery</span></h2>
				<ul class="tab">
					<li class="curr fore"><a href="#">小说</a></li>
					<li><a href="#">青春</a></li>
					<li><a href="#">文学</a></li>
					<li><a href="#">经济</a></li>
                    <li><a href="#">励志</a></li>
                    <li><a href="#">历史</a></li>
                    <li><a href="#">政治军事</a></li>
                    <li><a href="#">生活</a></li>
                    <li><a href="#">科技</a></li>
                    <li><a href="#">文教</a></li>
				</ul>
			</div>
			<div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_31.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_32.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_33.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_34.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
                <div class="extra"><a href="#">进入少儿频道&gt;&gt;</a></div>
			</div>
        </div>
        
        <div id="book_good">
			<div class="book_tit">
				<h2>独家好书<br /><span>Exclusive Deals</span></h2>
			</div>
			<div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_35.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_36.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_37.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_38.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
			</div>
		</div>
        
        <div id="book_set">
			<div class="book_tit">
				<h2>套装书<br /><span>Box-set Books</span></h2>
				<div class="extra"><a href="#" target="_blank">更多&gt;&gt;</a></div>
			</div>
			<div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_39.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_40.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_41.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_42.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
			</div>
		</div>
        
        <div id="discount">
			<div class="book_tit">
				<h2>超低折扣<br /><span>Discount Books</span></h2>
				<ul class="tab">
                    <li>20折以下</li>
					<li class="curr">20-30折</li>
					<li>30-50折</li>
				</ul>
                <div class="extra">
					<a href="#" target="_blank">全部特价&gt;&gt;</a>
				</div>
			</div>
			<div class="book_content">
				<ul class="pic_list">
					<li>
						<div class="pic_book">
							<div><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_43.jpg" /></a></div>
						</div>
						<div class="pic_intr">
                        	<a href="#" target="_blank">怪诞行为学：可预测的非理性（升级版）</a>
                        </div>
						<div class="pic_price">定价：<del>￥45.00</del></div>
						<div class="pic_price">会员价：<strong>￥27.70</strong></div>
					</li>
					<li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_44.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">三毛1943-1991</a></div>
						<div class="pic_price">定价：<del>￥39.80</del></div>
						<div class="pic_price">会员价：<strong>￥27.30</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_45.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">DSLR数码单反摄影完全手册（附DVD光盘2张）</a></div>
						<div class="pic_price">定价：<del>￥99.00</del></div>
						<div class="pic_price">会员价：<strong>￥68.90</strong></div>
					</li>
                    <li>
						<div class="pic_book">
							<div class=""><a href="#"><img src="__PUBLIC__/home/img/book_46.jpg" width="130" height="130"/></a></div>
						</div>
						<div class="pic_intr"><a href="#" target="_blank">新育儿百科</a></div>
						<div class="pic_price">定价：<del>￥68.00</del></div>
						<div class="pic_price">会员价：<strong>￥42.00</strong></div>
					</li>
				</ul>
			</div>
		</div>
        
         	
    </div>
    <!--中间部分结束-->
    
    <!--右边部分开始-->
    <div id="right">
    	<div class="" id="report">
			<div class="book_tit">
				<h2>图书资讯<br /><span>Book News</span></h2>
			</div>
			<div class="book_content">
				<ul>
                     <li>·<a  Target="_blank"  href="#">京东读书频道正式上线喽！</a></li>
                     <li>·<a  Target="_blank"  href="#">好书360和Best So Far活动上线！</a></li>
                     <li>·<a  Target="_blank"  href="#">投资好书大集结33折起</a></li>
                     <li>·<a  Target="_blank"  href="#">孕产育儿畅销书27折起！</a></li>
				</ul>
			</div>
		</div>
        
        <div class="ad_right">
        	<div><img src="__PUBLIC__/home/img/book_47.jpg" /></div>
            <div><img src="__PUBLIC__/home/img/book_48.jpg" /></div>
        </div>
        
        <div id="book_prepare">
			<div class="book_title">
				<h2>新书预售推荐<br /><span>Top Pre-sale Books</span></h2>
			</div>
			<div class="book_info">					
                <div class="book_pic">
                    <div class=""><a href="#" target="_blank"><img src="__PUBLIC__/home/img/book_49.jpg"/></a></div>
                </div>
                <div class="book_text">
                    <div class="book_name"><a href="#" target="_blank"><font color="#FF0000">中国式百万富翁</font></a></div>
                    <div class="book_intr">　　【处于我们这个激荡变化时代的中国人，只要按这些简...<br> ...</div>
                    <div class="book_more"><a href="#" target="_blank">深度了解&gt;&gt;</a></div>
                </div>	
			</div>
		</div>
        
        <div id="pub_recommend">
			<div class="book_tit">
				<h2>出版社热推<br /><span>Publishers’ Recommendation</span></h2>
			</div>
            <div id="pub_content">
            	<div id="left_arrow"></div>
                <div id="pub_list"><img src="__PUBLIC__/home/img/book_50.gif" /></div>
                <div id="right_arrow"></div>
            </div>
		</div>
        
        <div id="week_sale">
			<div class="book_tit">
				<h2>每周畅销榜<br /><span>Daily Bestsellers</span></h2>
			</div>
            <div class="book_content">
            	<div class="toggle">
					<h3><a href="#" target="_blank">每周畅销图书总榜</a></h3>
						<ul class="num_tab">
							<li class="curr"><span>1</span></li>
							<li><span>2</span></li>
							<li><span>3</span></li>
							<li><span>4</span></li>
						</ul>
				</div>
                <div class="clear"></div>
				<div class="tab_content">
						<ul class="tab_list">
							<li><a href="#" target="_blank">小说</a></li>
							<li><a href="#" target="_blank">文学</a></li>
							<li><a href="#" target="_blank">青春</a></li>
							<li><a href="#" target="_blank">传记</a></li>
							<li><a href="#" target="_blank">艺术</a></li>
							<li><a href="#" target="_blank">少儿</a></li>
							<li><a href="#" target="_blank">经济</a></li>
							<li><a href="#" target="_blank">金融</a></li>
							<li><a href="#" target="_blank">管理</a></li>
							<li><a href="#" target="_blank">励志</a></li>
						</ul>
				</div>
                <ul class="rank">
					<li class='fore'>
                    	<span>1</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>养育女孩 </a></div>
                        <div class='pic_price'>定价：<del>￥24.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥14.80</strong></div>
                    </li>
                    <li>
                    	<span>2</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_52.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                   	<li>
                    	<span>3</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>4</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>5</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>6</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>7</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>8</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>9</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>10</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
				</ul>
				<div class="extra" style="line-height:30px;float:right;border-top:1px solid #EFEFEF;margin:2 2px;text-align:right;width:205px;margin-right:5px;"><a href="#" target="_blank">查看完整榜单 &gt;&gt;</a></div>              
            </div>

		</div>
        
        <div>
        	<div class="ad_right"><img src="__PUBLIC__/home/img/book_53.jpg" /></div>
            <div class="ad_right"><img src="__PUBLIC__/home/img/book_54.gif" /></div>
        	<div class="ad_right"><img src="__PUBLIC__/home/img/book_55.gif" /></div>
            <div class="ad_right"><img src="__PUBLIC__/home/img/book_56.jpg" /></div>
        </div>
        
        <div id="new_sale">
			<div class="book_tit">
				<h2>新书热销榜<br /><span>Hot New Books</span></h2>
			</div>
            <div class="book_content">
                <ul class="rank">
					<li class='fore'>
                    	<span>1</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>养育女孩 </a></div>
                        <div class='pic_price'>定价：<del>￥24.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥14.80</strong></div>
                    </li>
                    <li>
                    	<span>2</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_52.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                   	<li>
                    	<span>3</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>4</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>5</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>6</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>7</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>8</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>9</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
                    <li>
                    	<span>10</span>
                        <div class='p-img'><a href='#' target='_blank'><img src="__PUBLIC__/home/img/book_51.jpg"/></a></div>
                        <div class='p-name'><a href='#'  target='_blank'>乐活族-最经典的脑筋急转弯 </a></div>
                        <div class='pic_price'>定价：<del>￥10.00</del></div>
                        <div class='pic_price'>会员价：<strong>￥1.00</strong></div>
                    </li>
				</ul>
				<div class="extra" style="line-height:30px;border-top:1px solid #EFEFEF;margin:2 2px;text-align:right;width:205px;margin-right:5px;"><a href="#" target="_blank">查看完整榜单 &gt;&gt;</a></div>              
            </div>

		</div>
        
        <div id="reviewer">
        	<div class="book_tit">
				<h2>京东书评人<br /><span>360buy Book Reviewers</span></h2>
			</div>
            <div class="user_content">
            	<ul>
                	<li>
                    	<div class="user_pic"><img src="__PUBLIC__/home/img/book_57.jpg" /></div>
                        <div class="user_info"><font color="#FF6666">wlpok</font><br /> 浙江<br />  铜牌会员 </div>
                        <div class="clear"></div>
                        <div class="user_post"><a href="#">《把男孩培养成男孩:培养诚…》</a></div>
                        <div class="user_reply">深受读者好评。</div>
                        <div class="user_content">这书在2009年获美国图书馆协会图书奖“家庭教育类”提名，曾**家庭教育类销售排名第一，《纽约时报》排行榜连续在榜七十余周。几年来深受读者好评。　　让儿子学会自制和思考，是他成为具有诚实、自律、勇
                        </div>
                        <div class="user_more">[查看全部]</div>
                    </li>
                    <li>
                    	<div class="user_pic"><img src="__PUBLIC__/home/img/book_58.jpg" /></div>
                        <div class="user_info"><font color="#FF6666">sky05161124</font> <br />江苏 <br />银牌会员 </div>
                        <div class="clear"></div>
                        <div class="user_post">《世界很好，我们很糟》 </div>
                        <div class="user_reply">淡淡的歌</div>
                        <div class="user_content">                有如一首淡淡的歌，每一句话我都要细细回味，还没有看完，只是看了前言就已经很神往了！书的外表不错了，很喜欢，所以推荐一下，比较适合女孩子，不过她本身就是送给一个女孩子的，如果你的心里有很多秘密
                        </div>
                        <div class="user_more" style="border:none;">[查看全部]</div>
                    </li>
                 </ul>
                 <div class="more_comment">更多评论>></div>
            </div>
        </div>
        
    </div>
    <!--右边部分结束-->
</div>

<div class="clear"></div>

<!--服务部分开始-->
<div class="page_width">
	<div id="service">
		<dl class="fore1">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div class="item test"><a href="#" target="_blank">购物流程</a></div>
				<div class="item"><a href="#" target="_blank">会员介绍</a></div>
			    <div class="item"><a href="#" target="_blank">订单状态</a></div>
				<div class="item"><a href="#" target="_blank">常见问题</a></div>
				<div class="item"><a href="#" target="_blank">大家电</a></div>
				<div class="item"><a href="#" target="_blank">联系客服</a></div>
			</dd>
		</dl>
        <dl class="fore2">
			<dt><b></b><strong>配送方式</strong></dt>
			<dd>
				<div class="item"><a href="#" target="_blank">上门自提</a></div>
				<div class="item"><a href="#" target="_blank">快递运输</a></div>
				<div class="item"><a href="#" target="_blank">特快专递（EMS）</a></div>
				<div class="item"><a href="#" target="_blank">如何送礼</a></div>
			</dd>
		</dl>
		<dl class="fore3">
			<dt><b></b><strong>支付方式</strong></dt>
			<dd>
				<div class="item"><a href="#" target="_blank">货到付款</a></div>
				<div class="item"><a href="#" target="_blank">在线支付</a></div>
				<div class="item"><a href="#" target="_blank">分期付款</a></div>
				<div class="item"><a href="#" target="_blank">邮局汇款</a></div>
				<div class="item"><a href="#" target="_blank">公司转账</a></div>
			</dd>
		</dl>
		<dl class="fore4">
			<dt><b></b><strong>售后服务</strong></dt>
			<dd>
				<div class="item"><a href="#" target="_blank">退换货政策</a></div>
				<div class="item"><a href="#" target="_blank">退换货流程</a></div>
				<div class="item"><a href="#" target="_blank">价格保护</a></div>
				<div class="item"><a href="#" target="_blank">退款说明</a></div>
				<div class="item"><a href="#" target="_blank">返修申请</a></div>
				<div class="item"><a href="#" target="_blank">退款申请</a></div>
			</dd>
		</dl>
		<dl class="fore5">
			<dt><b></b><strong>特色服务</strong></dt>
			<dd>
				<div class="item"><a href="#" target="_blank">夺宝岛</a></div>
				<div class="item"><a href="#" target="_blank">DIY装机</a></div>
				<div class="item"><a href="#" target="_blank">延保服务</a></div>
				<div class="item"><a href="#" target="_blank">家电下乡</a></div>
				<div class="item"><a href="#" target="_blank">京东礼品卡</a></div>
				<div class="item"><a href="#" target="_blank">家电以旧换新</a></div>
			</dd>
		</dl>
        <div class="clear"></div>
		<ul>
			<li class="fore"><a href="#" class="blink1" target="_blank">正品行货 品质保证机打发票</a></li>
			<li><a href="#" class="blink2" target="_blank">211限时达 上午下单当日送达</a></li>
			<li><a href="#" class="blink3" target="_blank">全场免运费 不限金额不限地区</a></li>
			<li><a href="#" class="blink4" target="_blank">售后100分 全国上门取件100分钟内解决</a></li>
		</ul>
        
	</div>
</div>
<!--脚部开始-->
<div class="page_width">
	<div id="footer">
		<div class="flinks">
            <a href="#" target="_blank">关于我们</a>
            |
            <a href="#" target="_blank">联系我们</a>
            |
            <a href="#" target="_blank">人才招聘</a>
            |
            <a href="#" target="_blank">商家入驻</a>
            |
            <a href="#" target="_blank">广告服务</a>
            |
            <a href="#" target="_blank">京东社区</a>
            |
            <a href="#" target="_blank">友情链接</a>
            |
            <a href="#" target="_blank">销售联盟</a>
        </div>
		<div class="copyright">
        北京市公安局海淀分局备案编号：1101081681&nbsp;&nbsp;京ICP证070359号&nbsp;&nbsp;
        <a href="# target="_blank">音像制品经营许可证苏宿批005 号</a><br>Copyright&copy;2004-2011&nbsp;&nbsp;360buy京东商城&nbsp;版权所有
        </div>
		<div class="ilinks">
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/f_icp.gif" width="108" height="40" alt="经营性网站备案中心">
            </a>
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/knetSealLogo.jpg" width="112" height="40">
            </a>
            <a href="#" target="_blank">
            <img src="__PUBLIC__/home/images/f_hdwj.jpg" width="108" height="40" alt="海淀网络警察">
            </a>
        </div>
	</div>
</div>
</body>
</html>