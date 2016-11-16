知识点：
	一 window对象介绍
	二 window对象属性方法
	三 window的子对象的介绍
	四 history对象
	五 location对象
	六 screen对象

一 window对象介绍
	BOM browser object model 浏览器对象模型
	window是bom的核心  浏览器窗口。bom 范围最大的window
	window对象:	
				document  history frames locatiuon  navigator screen
				document  对象：
									forms images links anchors
二 window对象属性方法
	1 属性:
		了解:
		ie
		screenLeft 获得浏览器距离屏幕左上角的左边距
		screenTop 获得浏览器距离屏幕左上角的上边距
		ff
			screenX  top
			screenY   left
		
		获得浏览器的尺寸:
			clientWidth
			clientHeight 
			document.documentElement.clientWidth; 
		
		框架集中的对象。
		top
		parent
		top 和parent的含义: 指向父页面
		self  ==》window  self. screenLeft
		在子框架页面中，top和parent都是指向 父页面。
		
		2 window中的方法：
			resizeBy(x,y)调整浏览器 x y 大小。
			定时器 。
			setInterval（"函数，代码段",间隔时间（毫秒））在指定的周期内，不断执行函数。
			setTimeout（"函数，代码段",间隔时间（毫秒））定时执行一次。
			
	window.onload:当窗口加载完毕执行。
			setInterval 返回对象。
			clearInterval 清除定时器对象。
			open: window打开一个新窗口 
				window.open(url,"name","属性列表")
			onclick=""  单击执行代码
			属性列表：
				height
				width
				top
				left
				index.php-->test.php 在test中 index 是test openner
				window.alert 
				
四 history对象 
history 历史：		js  历史记录对象，在历史记录当中跳转
	1 方法：
		back() 后退	*******
		forward() 前进
	在项目中 一般用 history 控制 页面的前进和后退  不具有刷新页面功能

五 location对象
	 1 属性：
	 	href: 设置跳转的url*****
		window.location.href="http://www.baidu.com";
		window.lcoation = "http://www.baidu.com";
		具有刷新页面功能****
	2 方法
		reload(true/false) 重新加载当前文档（刷新）
		window.reload(true) 

六 screen对象
	height
	width
	availheight 返回屏幕高度，不包括任务栏
	aiailwidth  返回屏幕的宽度，不包括任务栏




	
