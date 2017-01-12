<?php

include("admin/fun/inc.php");
include("admin/fun/mysql.fun.php");

/**
 *  读取新闻详情
 */

$nId = $_GET["nId"];  //主类型id
$sql = "select * from news where nId=".$nId;
$rs = fetchOne($sql);
//print_r($rs);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="style/main.css"/>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/tab.js"></script>

</head>

<body>
	<div class="banner w1000">
		<div class="banner-top">
			<div class="banner-login left">
				<em>政务通邮箱</em>
				<span>用户名:<input type="text"/>@jl.gov.cn</span>
				<span>密码:<input type="password"/></span>
				<a href="###">邮箱登录</a>
			</div>
			<div class="banner-rt right"><a href="###">设为首页</a>&nbsp;|&nbsp;<a href="###">添加收藏</a>&nbsp;|&nbsp;<a href="###">政务微博</a>&nbsp;|&nbsp;<a href="###">编委会</a></div>
			<div class="clear"></div>
		</div>
		<div class="banner-bot">
			<div class="d-time left">
				<script language="JavaScript">
					<!-- 
					//以下是年月日星期显示
					tmpDate=new Date();date=tmpDate.getDate();month=tmpDate.getMonth()+1;year=tmpDate.getFullYear();document.write(year);document.write("年");document.write(month);document.write("月");document.write(date);document.write("日  ");myArray=new Array(6);myArray[0]="星期日 "
					myArray[1]="星期一 "
					myArray[2]="星期二 "
					myArray[3]="星期三 "
					myArray[4]="星期四 "
					myArray[5]="星期五 "
					myArray[6]="星期六 "
					weekday=tmpDate.getDay();if(weekday==0|weekday==6)
					{document.write(myArray[weekday])
					}else
					{document.write(myArray[weekday])
					};
					//-->
				</script>
			</div>
			<div class="scroll-news left"><marquee scrollamount="3"><a href="###" target="_blank">吉森火警 (2014)第1期 高森林火险警报</a></marquee></div>
			<div class="searchbox right"><a class="right" href="###">查询</a><em>站内检索</em><input type="text" onFocus="if (value =='请输入关键字'){value =''}" onBlur="if (value ==''){value='请输入关键字'}" name="tree_name" id="tree_name" value="请输入关键字" autocomplete="off"></div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="bodyer w1000">
		<div class="article-tit">
			<h2><?php echo $rs["nTitle"]?></h2>
			<h3><span>吉林省林业厅处室子站群 <?php echo $rs["nSource"]?></span>	<span>日期：  <?php echo $rs["nDate"]?></span>	<span>来源：  <?php echo $rs["nSourceName"]?></span></h3>
		</div>
		<div class="article-con">
				 <?php echo $rs["nContent"]?>
		</div>
	</div>
	<div class="footer mt5 w1000">
		<div class="ft-top alC"><a href="###">网站地图</a>&nbsp;|&nbsp;<a href="###">关于我们</a>&nbsp;|&nbsp;<a href="###">网站通告</a>&nbsp;|&nbsp;<a href="###">联系我们</a></div>
		<p class="alC mt5">主办单位：吉林省林业厅 承办维护：吉林省林业信息中心</p>
		<p class="alC">地址：长春市亚泰大街3698号 邮编：130022</p> 
		<p class="alC">电子邮箱：lyt@jl.gov.cn 联系电话：0431-88627583 吉icp备084512号</p>
		<p class="alC">吉大正元信息技术股份有限公司 技术支持</p>
	</div>
</body>
</html>
