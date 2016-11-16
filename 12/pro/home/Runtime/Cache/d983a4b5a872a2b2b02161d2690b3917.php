<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="__PUBLIC__/home/css/editOrderInfo_style.css" type="text/css">

</head>

<body>
<div id="bodyPart">
	<div id="top">
		<div id="logo"></div>
		<div id="Cart">
			<ul>
				<li id="myCart">1.我的购物车</li>
				<li id="writeInfo" class="white">2.填写核对订单信息</li>
				<li id="successSub">3.成功提交订单</li>		
			</ul>
		</div>
	</div>
	<div class="List_cart">
		<h2>
			<strong>填写核对订单信息</strong>
		</h2>
		<form action="__URL__/success" method="post">
		<div class="cart_table">
			<div class="o_write">
				<h1>收货人信息&nbsp;<a href="#">[关闭]</a></h1>	
				<div class="middle">
					<table width="100%" cellspacing="0" border="0">
						<tr>
							<td width="85" valign="middle" align="right"><font color="red">*</font>收货人姓名：</td>
							<td valign="middle" align="left">
								<input type="text" class="txt" name="fName" id="consignee_addressName">&nbsp;
							</td>
						</tr>
						
						<tr>
							<td valign="middle" align="right"><font color="red">*</font>省　　份：</td>
							<td valign="middle" align="left">
								<span>
									<select name="fPro">
										<option>请选择</option>
										<option>北京</option>
										<option>上海</option>
										<option>天津</option>
									</select>
									<select name="fCity">
										<option>请选择</option><option>黄浦区*</option>
										<option>卢湾区*</option>
										<option>徐汇区*</option>
									</select>
								</span>&nbsp;&nbsp;注:标“*”的为支持货到付款的地区，<a href="#">查看货到付款地区</a>
							</td>
						</tr>
						
						<tr>
							<td valign="middle" align="right"><font color="red">*</font>地　　址：</td>
							<td valign="middle" align="left">
								<input type="text" name="fAddr" style="margin-left: 2px; width: 327px;" maxlength="50" class="txt">&nbsp;
							</td>
						</tr>
						
						<tr>
							<td valign="middle" align="right"><font color="red">*</font>手机号码：</td>
							<td valign="middle" align="left">
								<input type="text"  class="txt" name="fTel"> &nbsp;&nbsp;<font color="#000000">用于接收发货通知短信及送货前确认</font>
							</td>
						</tr>
						
						
						<tr>
							<td valign="middle" align="right">电子邮件：</td>
							<td valign="middle" align="left">
								<input type="text" class="txt" name="fEmail"> &nbsp;<font color="#000000">用来接收订单提醒邮件，便于您及时了解订单状态</font>
							</td>
						</tr>
						
						
						<tr>
							<td valign="middle" align="right">邮政编码：</td>
							<td valign="middle" align="left">
								 <input type="text" name="fPost"  style="width: 77px;" class="txt">&nbsp;<font color="#000000" style="margin-left: 53px;">有助于快速确定送货地址</font>
							 </td>
						</tr>
					</table>				
				</div><!--middle结束--->
			</div>
			<div class="o_write">
				<h1>支付及配送方式&nbsp;<a href="#">[关闭]</a></h1>	
				<div id="middle">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						 <tr>
							<td style="width: 240px;"><div class="grouptitle">支付方式</div></td>
							<td style="border-bottom: 1px solid rgb(238, 238, 238);">备注</td>
						 </tr>
					</table>	
					
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr>
						   <td valign="top" align="left" style="width: 240px;">
								<input type="radio" name="fPay" checked="checked" value="货到付款">
								<label style="margin-left: 2px;">货到付款</label>
							</td>
							<td valign="top" class="gray">当面付款后验货，支持现金、POS机刷卡、支票支付 <a href="#">查看运费及配送范围</a></td>
						</tr>
					</table>	
					
					
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr>
						   <td valign="top" align="left" style="width: 240px;">
								<input type="radio" name="fPay" value="在线支付">
								<label style="margin-left: 2px;">在线支付</label>
							</td>
							<td valign="top" class="gray">即时到帐，支持绝大数银行借记卡及部分银行信用卡 <a href="#">查看银行及限额</a></td>
						</tr>
					</table>									
				
					<div class="tsbox" id="payRemark">
					   <div style="padding: 2px 0pt;">支持以下银行在线支付：</div>
					   <table cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td style="height: 45px; width: 24%;"><img src="__PUBLIC__/home/img/logo_zggsyh.gif"></td>
								<td style="width: 24%;"><img src="__PUBLIC__/home/img/logo_zgjsyh.gif"></td>
								<td style="width: 24%;"><img src="__PUBLIC__/home/img/logo_zsyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_jtyh.gif"></td>
							</tr>
							<tr>
								<td style="height: 45px;"><img src="__PUBLIC__/home/img/logo_zgnyyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_gdfzyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_xyyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_zggdyh.gif"></td>
								</tr>
							<tr>
								<td style="height: 45px;"><img alt="中信银行" src="__PUBLIC__/home/img/logo_zxyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_pfyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_zgyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_szfzyh.gif"></td>
							</tr>
							<tr>
								<td style="height: 45px;"><img src="__PUBLIC__/home/img/logo_msyh.gif"></td>
								<td><img src="__PUBLIC__/home/img/logo_bjyh.gif"></td>
								<td cospan="2"></td>
							</tr>
							<tr>
								<td style="height: 18px; padding: 0px;" colspan="4"><div style="text-align: left;">支持以下支付平台：</div></td>
							</tr>
							<tr>
								<td><img align="center" src="__PUBLIC__/home/img/y_cft.gif"></td>
								<td><img src="__PUBLIC__/home/img/y_kq.gif"></td>
								<td><img src="__PUBLIC__/home/img/y_zfb.gif"></td>
								<td><img src="__PUBLIC__/home/img/mobile.gif"></td>
							</tr>
						</table>
					</div>				
				</div>	
				
			</div>
			<div id="submit_btn"><input type="image" src="__PUBLIC__/home/img/submit.jpg"></div>	
			<div id="line"></div>
		</div>
		</form>
		<!---cart_table结束--->
		<div class="round">
			<div class="lround"></div>
			<div class="rround"></div>
		</div>					
	</div><!---List_cart结束--->
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