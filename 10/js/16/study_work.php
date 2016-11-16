知识点：
	一 ajax 概述
	二 ajax 使用
	三 ajax 封装包
	四 demo
	
	
一 ajax 概述
1.ajax 概念：
	ajax 属于js。
	1》什么是ajax
	    ajax 创建交互式网页应用的开发技术，可以与后台程序（数据库）进行数据的交互。
		ajax 实现了网页的异步更新，对网页的一部分进行刷新。******
		异步：相对于同步，在页面上可以实现局部更新
	2》ajax 优势:
		异步更新*****
		有利于数据的缓冲****
		是b/s结构的软件有了更好的用户体验。
二 ajax 使用
	 1  创建ajax对象
	 	 ie  6 ， 7 ，8  
		 	var obj = new ActiveXObject("Microsoft.XMLHTTP"); //创建了 微软提供的 xmlhttp对象
		 ff		ie9 
		 	var obj = new XMLHttpRequest(); 
	   创建兼容ajax对象
	
	2 连接服务器:
		obj.open("get/post","连接页面的url",true/false); //连接服务器的相应页面（不一定是首页）
		true/false 是否异步执行请求。
	3 发送请求
		obj.send();
	4 执行监听
		onreadystatechange  监听事件
		readyState = 4 执行  完成了
		status = 200 执行成功
		obj.onreadystatechange = function(){  
			 if(obj.readyState==4){
			 	 if(obj.status==200){
				 	alert("执行ok");
				 }
			 }
		}
	5 接受返回数据
		obj.responseText // 从服务器 异步返回的数据
	注意：
	ajax 有缓存  在open中的url上绑定一个随机数。
	a.php页面中什么数据能放入reponseText中    普通文本  php程序中输出的内容，html代码
	6 如何通过get传值的方式 传递有效值。
		get传递值的时候 需要把传递至 以 参数=值  写到url后边。
	7 ajax 用 post 传值。  demo2
		oAjax.open("POST","a.php?random="+Math.random(),true);//连接a页面
		//setRequestHeader();
		//Content-Type","application/x-www-form-urlencoded 表示客户端提交给服务器的数据内容以及编码方式。
		oAjax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
		oAjax.send("id="+3); //发送请求了
		
三 ajax 封装包		
	demo3  

练习:
	ajax 封包内容，3次。
	

四 demo		
用户名 、邮箱 注册的时候不能重复的问题。		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		