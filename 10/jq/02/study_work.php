知识点：
	一 jq中DOM
		jq --》js 开发的框架
		1 DOM操作分类:
			DOM document object model  
			1》DOM core 核心 
			2》 html DOM 对于html标记来进行操作的
			3》 css DOM 对于样式进行操作。
			
		
		2 jquery 操作dom
			选中元素--》 选择器。
		3 创建节点:
			父元素.append("子元素")；向父元素中追加子元素。 ******
			
			其他需要了解的方法：
			子元素.appentTo("父元素") ,把子元素追加到父元素中。
			父元素.prepend("子元素 ") 向父元素中前置内容
			子元素.prepend("父元素") 把子元素 前置到父元素中。
			
			匹配的元素.after(要插入的元素) 把 要插入的元素 插入到 匹配的元素之后
			匹配的元素.before(要插入的元素)  把 要插入的元素 插入到 匹配的元素之前
		
		4 删除节点: 
			remove 删除不需要的节点内容
			对象.remove
		5 复制节点: 了解
			被复制的对象.clone() 克隆对象。
		6 属性操作:
			1> attr() 获取和设置属性值。
				获取 对象.attr("属性名称")
			   设置: 对象.attr("属性名称","属性值");
			 2> 注意 设置多个属性
			 	对象.attr({"属性名称":"value","属性名称":"value"..........})
			3>删除属性:	
				removeAttr(属性名称)		
			
		7 css dom 主要是jquery操作 样式
			1》元素class 属性  class="className";
				对象.attr("class"); 获取元素的class value
				对象.attr("class","value") 设置class value  新样式会把旧的样式替换掉。******
			2》追加样式 addClass()
			对象.addClass("className")
			3> 删除样式
			对象.removeClass();
			4》补充:
				判断元素是否含有某个class名称。
				对象.hasClass("className");  有 true 没有false
				对象.is("className") 
		
		8 常用的jq函数
		    html() 方法可以获取或设置元素内的html内容（包括文本）==》innerHTML
			text() 可以甚至或获取元素的文本
			val()  用来设置或获取元素的 value="" ==>表单元素 value ==> js  obj.value;
		
		9 jq 遍历节点 ：访问到元素下的每一个元素。
			children() 子元素  得到一个集合
			next()  获取同辈中的下一个元素
			prev() 获取同辈中的前一个元素
			siblings() 获取同辈中前后的所有元素。
		 作用：访问连续的元素。
		 10 jquery css方法。
		 	 attr("class","className");
			 obj.css方法  获取css  设置css
			 获取
			 	obj.css("样式名称")
			 设置
				obj.css("样式名称","value")
				obj.css({"样式名称":"value","样式名称":"value","样式名称":"value",......})
				
			11 offset(); 获得当前视窗的相对偏移量  top() left();
			12 demo
				1> html css div 
		
		
		
		
		
		
		
		
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		
		
		
		
		
		
		
		
		
		
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				
		