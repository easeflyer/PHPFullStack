知识点：
一 js中DOM介绍
二DOM的相关操作
三 js DOM案例

一 js中DOM介绍
DOM：document object model 文档对象模型，独立于平台和语言 方式。 html dom 
在html中，DOM 约定：文档中每一个部分都是一个节点
DOM	
	文档节点
	元素 节点（标记）
	文本节点 （标记中的内容）
	属性节点（标记的属性）
	注释节点 (<!--内容-->)
	
父节点 子节点 兄弟节点

二DOM的相关操作 
对dom 中所有节点进行增 删 操作。
1 获取节点  ：dom操作的第一步 获取节点
	getElementById()
	getElementsByTagName();
	getElementsByName();
	
	缺点：逻辑性和关联性差。

	注意：节点内容：
	节点属性：
	
	节点名称				节点类型				节点的名字			节点值
								nodeType			nodeName				nodelValue
	元素节点					1							标签名称 				null
	属性节点					2							属性名称				属性值
	文本节点					3							#text					文本内容
	注释节点					8							#comment			注释内容
	文档节点					9						    #document			null
	
	注意：nodeType  nodeName nodeValue  调用方式 :对象.nodeType/nodeName/nodeValue
	
	通过节点的关系来获得节点。 了解：
	对象.parentNode  获取父节点对象。
	对象.childNodes 获得子节点的集合
	对象.firstChild 获取对象的第一个子节点
	对象.lastChild 获取对象的最后一个子节点
	对象.nextSibling 获取下一个兄弟节点
	对象.previousSibling 获取上一个兄弟节点。
	注意：逻辑性和关联性比较好，兼容性不太好
	对象.childNodes 所有子节点的集合。
	
	兼容性：
		ie9  ff  标记之间的换行空白 也看做标记
		ie8 一下的浏览器，不不能再该问题。
	
2 .创建元素节点：	
	1》创建
		document.createElement("元素名称");
	2> 为已经创建的元素节点添加属性:
		常用：
			对象.属性名称 = 值  *****
		方法：
			对象.setAttribute("属性名称","值");
			对象.getAttribute("属性名称")
	3》innerHTML
			对象.innerHTML = "值"；
	4>appendChild()
		父对象.appendChild(子对象) 父对象的最后一个子元素追加下一个元素

练习：
	demo5  页面中 创建一个图片   src  width  height  追加到body
	
	5:》补充：
		insertBefore()
		父对象.insertBefore(要插入的对象，之前的对象) 在...之前插入对象。
	
	6》删除节点
	父对象.removeChild(子对象)
	父对象删除子对象
	父对象= null	
	
三 js DOM案例
	弹出登录框:
		
作业：弹出登陆框  3次。	
	
	
	
	
	
	
	
	
	
	
	
	
	

















