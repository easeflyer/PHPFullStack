知识点：
	一 js中关于尺寸和位置
	二 登陆锁频
	三 dtree的使用
	
一 js中关于尺寸和位置
	js中动画效果靠改变元素的css样式来实现的。改变元素的尺寸和位置比较重要。
		1 获得元素的尺寸
			元素对象.style.属性值
		2 clientWidth clientHeight 
			获取元素可视部分的宽度和高度。数值number
			注意：如果出现滚动条，不算滚动条的宽度和高度的。
		3 offsetWidth offsetHeight
			获得元素的实际高度和宽度（算滚动条和算边框）
			
		4 获取元素的位置：
			元素对象.style.属性:获取到在行内设定的属性值   style="样式的值".
			offsetTop offsetLeft  返回元素相对于父元素的坐标（left 和 top值）
			设定postion
				left+边距  top+边距
			没设定postion
				距离： 自身边距+ 父元素边距
			实际状态中 必须是打印offsetTop offsetLeft ****

二 登陆锁频			
	1 创建一个遮罩层
	2 创建对话框的内容
	3 为对话框添加关闭选项 ---》添加表单了。	
				
三 dtree的使用 
	js开发的组件，用来实现 菜单树。 无限极<br />
1	对dtree进行实例化
2 需要 调用dtree add方法 添加菜单项
	tree.add(1,0,"aaa","","bbbb")
	id,  菜单的序号
	pid, 父菜单的id
	name, 菜单名称
	url, 打开的页面
	 title, 鼠标移动上去的提示文字
	 target，在什么位置打开 应用框架中。
	 
	 tree.openAll() 打开所有子菜单
	 tree.closeAll()关闭所有子菜单

alixixi.com









