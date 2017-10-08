知识点：
	一 主入口文件 项目的主入口文件
	二 url路径访问与模块 控制器之间的关系
	
一 主入口文件 项目的主入口文件
	前台和后台
	
二 url路径访问与模块 控制器之间的关系
	访问admin.php ---> admin/lib/action/indexAction.class.php/index方法
	访问url	
		http://localhost:8888/thinkphp/02/admin.php
		http://localhost:8888/thinkphp/02/admin.php/index
		http://localhost:8888/thinkphp/02/admin.php/index/index
	 
	 http://localhost:8888/thinkphp/02/admin.php/index/index  //默认访问index
	 	thinkphp中 url 关系:
	 		所有访问页面的路径:  主入口文件/模块(控制器Action)/方法名称
	 		注意：
	 			模块:控制器: indexAction 前面 的index
	 			方法名称  控制器中的一个方法。
	 	demo
	 		http://localhost:8888/thinkphp/02/admin.php/index/reg  //默认访问index
	 		http://localhost:8888/thinkphp/02/admin.php/users/index
	 	注意：
	 		新建模块：文件名 必须与类名相同，而且类和模块名称的首字母都需要 大写。
	 	
	 	1 传统模式: 普通模式  设置URL_MODEL 为0  了解
	 		http://localhost:8888/thinkphp/02/admin.php?m=index&a=index
	 		m 代表的是模块
	 		a 代表的是动作
	 	2 pathInfo  设置URL_MODEL 为1  默认访问模式 ***************
	 		http://localhost:8888/thinkphp/02/admin.php/index/reg/id/100
	 	3 rewrite模式  了解
 	 	4 兼容模式    了解
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		
	 		