知识点：
	一 js操作标记的内容
	二 js操作标记的属性
	三 js操作标记的样式
	四 js操作表单
	
一 js操作标记的内容
	<div >内容（文本和其他html div 标记）</div>	
	1 innerHTML 设置或获取对象的内容（文本和html div标记）; ie ff  ***
		获取：obj.innerHTML
		设置: obj.innerHTML = value
	2 innerText 用来设置或获取标记的内容（文本） ie 
	   testContent 用来设置或获取标记的内容（文本） ff 
	
二 js操作标记的属性
	 <table border="" align="" cellpadding="".....>
	 <img src="" width=""....>
	 1 直接操作属性*****
	 	 获取： obj.属性名称
		 设置:   obj.属性名称 = 值
		 注意：如果属性是2个以上单词构成，第二以后的单词首字母大写*****;
	2 获取和设置属性的方法 (知道)
		getAttribute("属性名称");
		setAttribute("属性名称","值");
	
	
三 js操作标记的样式
	1 . 行内样式（标记上style=""）;
		获取 obj.style.样式名称
		设置 obj.style.样式名称 = value 
		注意：如果样式名称 font-width 格式  必须转换 fontWeight
	2.利用css选择器来操作样式
		#id
		.class  
		<div id="??" class="???">
		js引用class ==>className
		js.id = "value";
	
四 js操作表单(先获取表单元素对象，在对表单对象的属性进行操作);
	1 获取表单元素：
		getElementById  ****
		getElementsByTagName ****
		getElementsByName
		onsubmit 当表单提交的时候 触发...
	2 通过elements 集合 来获取表单元素集合
		表单对象.elements[下标/"name"]获取元素。
	3 blur() 失去焦点  focus() 得到焦点
		元素对象.focus(); 锁定焦点的。
	
	4 表单元素单独介绍
		1》文本框<input type="text">
		value
		2》单选框
			var obj = document.getElementById("us");
			obj.checked = true  / false
		3》多选框:
			
注意：比单元素 操作最多的 复选框 和 text
复选框：全选
text   邮箱 用户名 手机 身份证..验证（正则）;

作业：
	写一个 用户注册页面
		用户名 6--18 字母 数字 _
		邮箱 aa@aa.com
		手机 13111111111
		身份证  123456789123456789
	全选  3次。















		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	