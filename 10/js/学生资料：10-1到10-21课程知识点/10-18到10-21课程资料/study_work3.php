知识点：
	一 jquery 中的事件
	二 jquery中的动画 
	三 demo 图片轮播效果
	
一 jquery 中的事件
	1 重要事件：
		$(document).ready(function(){}) 当页面的中的所有dom元素加载完毕执行。 不管img  flash 有没有加载完毕。
		window.onload = function  页面的所有元素加载完毕  img  flash 
		多次调用。一般调用 不会超过2个。
		$(document).ready(function(){}) 
		$(document).ready(function(){}) 
		$(document).ready(function(){}) 
		
		$(document).ready(function(){})《 ==》$(function(){  方法体 })《==》$().ready(function(){})
		
	2 bind 方法：
		格式：
			bind("事件名称",function(){  
				方法体
			})
		blur focus load click mouseover mouseout submit change
		注意：jq  --》js  事件名称前面不加on
		demo 
		用bind 绑定 mouseover mouseout
	
	3 对象.事件名称********
		注意：
			对象.事件名称(function(){})  ==》 对象.bind("事件",function(){})
	
	4  合成事件:
		作用 ： 相互独立的事件合并成一个事件。
		1》hover(enterfunction,leavefunction)  ==>mouseover+mouseout
			合成的是 鼠标移入移出 两个事件
		2》 事件对象  *****  event/e
		event.type() 获取事件类型
		event.pageX() event.pageY()  获得鼠标的纵横坐标的。
	
	5 删除事件:
		针对于 bind 绑定的事件 来操作
		格式: unbind（"事件类型",要删除的函数）;
		
	注意：
	事件操作的时候 
		对象.bind
		对象.click  ******* 
	
二 jquery中的动画 
	jquery动画 实现 基本的简单的 线性 透明度 类似的动画。
	 1  show  hide  ****
			对象.show(slow  normal fast  num(数值))
			对象.hide	(slow  normal fast  num(数值))
			注意：改变元素的宽度和高度，透明度也发生变化。
	 2 fadeIn  fadeOut  ***
	 	fadeIn()     升高透明度
		fadeOut()  降低元素的透明度
	 3 slideUp slideDown
	 	在jquery 2.*版本中 不太好用。
		slideUp slideDown 改变元素的高度，来实现元素的可见性控制的。
	 4 自定义动画方法 animate();
	 	格式：
			animate(样式列表,时间,callback);
			callback,在动画执行完成的时候，执行回调函数
		动画 队列：
			写在一个animate中的内容 会同时执行。
			如果写在多个animate中，里面 样式就具有了先后顺序。
			hide show fadeIn fadeOut slideUp slideDown animate 动画方法。遵循队列先后顺序。
			.css attr val  非动画方法 ，一开始就执行了。
			callback 提示一个动作，或者是出发一个新的动作。
	    动画的终止：
			stop() 终止动画  了解。
		补充：
			判断元素是否处于运动状态。
			if($obj.is(":animated")){  是运动中 true 否则返回false
			
			}
			
			
			
			
			
三 demo 图片轮播效果
	1 div css 框架			
			
			
			
			
	
		
		
	
	
	
	
	
	
	
		
		
		
		
		
		
		
		
		