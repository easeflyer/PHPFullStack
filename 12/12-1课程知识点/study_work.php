知识点：
	一 什么是mvc
	二 手工编写mvc架构的用户管理模块
	
一 什么是mvc
	mvc  面向对象的	 把项目 认为的定义为 3层  m  v  c
	m model  		数据处理层
	v  view 			页面层
	c controller     控制器层   thinkphp  --》Action
	
	注意：mvc 特点
	1 》有单一入口  index.php?参数=值&参数=值
	2》m  v  c 每一部件都是封转在类中。
	
二 手工编写mvc架构的用户管理模块
	1》开发流程
		model  
		v
		controller/Action测试 调用
	2》mvc 开发
		 1 数据库通用类 可以对 mvc库中 users 表进行操作。
		 2 对于每一张表 新建一个model     UsersModel.class.php 主要是实现 users表的增 删 该 查。
		 3 创建 view 类  usersVeiw.class.php   view-->tpl
		 4 单入口:
		 	在url 地址栏中 只看到 index.php ???
                        
<?php
class cla{}
?>
















