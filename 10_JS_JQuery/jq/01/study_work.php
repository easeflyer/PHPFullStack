知识点：
	一 认识jquery
	二 jquery选择器
	
一 认识jquery
	1  js库:
		早期 写页面效果 js 写。可以用js开发包/插件/库 简化 js开发 提高开发效率，达到很好的浏览器兼容。
		js 库 : js代码开发。 常用库 ext js、dojo、yui 、jquery 
		本节内容 jquery --》js库(框架)
	2 jquery 优势:
		官方:
		  轻量级 
		  选择器强大
		  dom操作方便
		  完善的ajax
		  浏览器兼容性比较好。
		  手册比较丰富
		 我个人觉得:
		 	开源
			市场应用广泛。
		补充缺点:
			安全性
			jquery 将来不可预期
	3 获取jquery
		 jquery-2.1.1.min.js 压缩版  商用。
		 jquery-2.1.1.js		完整版  学习 研究
		 压缩版和完整版 代码一致。
	4 jquery 使用:
		<script type="text/javascript" src="js/jquery.js"></script>
	5 第一段 jquery 代码
	
	6 jquery 和 js  处理dom时候 对象的关系。
		<div id="div1"></div>
		js
			var dv = document.getElementById("div1");
		jq 
			var $dv = $("#div1"); 
			
		jq-->js obj    jq转换成js对象。
		var dv = $dv[0]; 
		js--》jq  js 转换成jquery  了解
		var  dv = document.getElementById("div");
		var $dv = $(dv); // js -->jquery对象
二 jquery选择器
	选择器： 选择页面 元素方法或方式。
	1 jquery中选择器:
		$("选择器的内容");
		1>基本选择器:  css 选择类似
			*  $("*") 			集合
			#id   $("#id");  单个元素
			.class  $(".className"); 集合
			element  $("div")  结合
		 	元素1，元素2，元素3  $("#id,.class,div") 集合 
		
		   对象.css("样式",“值”) 为元素添加 样式
		 2>层次选择器 
		 	$("ancestor descendant")  选取ancestor元素中的所有descendant(次级)元素
		  $("parent>child")选取parent元素下的child(二级)元素,与$("ancestor descendant")有区别,后者选择的是所有次级元素
		  $("prev+next")选取紧接在prev元素后的next元素
		  $("prev~siblings")选取prev元素之后的所有siblings元素
		  
		  3>基本过滤选择器  
		  对象:first
		  :first 选取第一个元素
		  :last 选取最后一个元素
		  :not(selector)排除所有与给定选择器匹配的元素  ：not(:first) 出了第一个元素以外的元素
		  :even  索引号为偶数的元素   从0开始
		  :odd   索引号为基数的元素  从0开始
		  :eq(index) 选取索引等于index的元素(index从0开始)
		 :gt(index)选取索引大于index的元素(index从0开始) 
		  :lt(index) 选取索引小于index的元素(index从0开始)
		  :header 选取所有的标题元素,例如h1,h2,h3等等 项目中不太常用 了解
		  :animated 选取当前正在执行动画的所有元素  用来进行判断的。*****
		
		4>内容过滤选择器 
			:contains(text)选取含有文本内容为"text"的元素  了解  $(div:contains("a"))
			:empty选取不包含子元素或者文本的空元素   用来进行判断的******
			:has(selector)选取含有选择器所匹配的元素的元素   $("div:has(p)")
			:parent选取含有子元素或者文本的元素			$("div:parent")
		5>可见性 过滤选择器 
		 :hidden选取所有不可见的元素  判断*****
		 :visible选取所有可见的元素      判断 *****
		 对象.is(:visible/:hidden/animated)
		 6>属性过滤选择器 
		 <table align="center" border="1" id="tb" width="800">
		 <table align="left" border="2" id="tb1" width="800">
		 <table align="right" border="3" id="tb2" width="800">
		 	[attribute]选取拥有此属性的元素    $("table[border]")
			[attribute=value]选取属性的值为value的元素   $("table[border=1]")
			[attribute!=value]选取属性的值为value的元素   $("table[border!=1]")		
			[attribute^=value]选取属性的值为value的元素   $("table[align^=c]")		
			[attribute$=value]选取属性的值为value的元素   $("table[align$=t]")		
			[attribute*=value]选取属性的值为value的元素   $("table[align*=e]")		
		 $("table[align^=c][id][width=800]")用属性选择器合并成一个复合属性选择器,满足多个添加.每选择依次,缩小一次范围
		 7>子元素 过滤选择器 
		 :nth-child(index/even/odd/equation)选取每个上级元素下的第index个子元素或者奇偶元素.(index从1算起)
		 :first-child选取每个上级元素的第一个子元素
		 :last-child选取每个上级元素的最后一个次级元素
		 :only-child如果某个元素是它上级元素中唯一的次级元素,那么将会被匹配.如果上级元素中含有其他元素,则不会被匹配
		 
		 8》表单属性状态 过滤选择器 
		 
		 :enable选取所有可用元素  **********
		 :disable选取所有不可用元素************
		 :checked选取所有被选中的元素(单选框,复选框)********
		 :selected选取所有被选中的选项元素(下拉列表)*********
		 
		 9》表单对象属性 过滤选择器 
		 :input 选择所有表单元素  包括 select  textarea
		 :表单元素名称  包括所有的表单元素。
		 
		 10 》 案例 demo
		 目的：
		 	选择器的使用
			补充一些常用的方法。
			对象.hide()  对象的隐藏   display:none
			对象.show() 对象的显示  display:block
			对象.text()   对象中的 文本
			对象.css()   对象的样式
			对象.removeClass()  删除对象的class属性值。
			
			一步: div css 页面
			二步：jquery/js代码
			三步: php + mysql 程序
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 	
		


