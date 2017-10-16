知识点:
一什么是smarty
二 smarty获取和安装部署
三smarty基础语法


一什么是smarty
	smarty 模板引擎
	模板引擎:
	传统:
		美工制作页面--》程序员添加程序
			传统开发 缺点:
				1.时间 效率不高
				2.程序代码和页面html代码高耦合: --》不利于页面和代码的维护
		模版引擎:
			程序和美工分开工作 节省了开发时间，提高维护效率。
			代码: 表现（html代码 div css）和业务逻辑（php程序）分离
	smarty : 模板引擎  市场占有率最高。

二 smarty获取和安装部署
	1.获取smarty模板引擎
		http://www.smarty.net
			smarty-3.1.15.zip  --> smarty-3.1.15-->libs(核心)-->Smarty.class.php（smarty主入口文件）
	2，如何安装部署:
		libs 拷贝到你的项目目录下
			smarty使用的使用 创建目录:
				templates/  html页面（模板页面 .html .tpl）
				templates_c/ 编译目录  2 手工创建  3.* 自动创建
				configs/ 手工配置目录
				cache/ 缓存目录 
	3.第一个调用smarty的代码
		创建对象的时候 ，不会创建 templates_c 
		$st->display("模板文件名称") 默认指向的就是templates目录
		调用模板时候会生成templates_c 
	4 使用smarty模板引擎
		1>导入 smarty 核心入口文件  include require
		2>实例化smarty对象
		3>调用模板  $smarty->display(模板文件名称);  

注意:
	smarty 的四个默认目录可以修改:
		$st->setTemplateDir("新路径"); 修改 templates目录
		$st->setTemplateDir("tpl/");  模板目录栏
		$st->setCacheDir("cc/");	缓存目录
		$st->setConfigDir("cf/");	配置文件目录
		$st->setCompileDir("tc/"); 编译文件目录
	建议不用修改:
		
三smarty基础语法
	index.php
	templates/index.html	 html代码	可以在模板中正常使用 div img ......
	1>php如何与模板通信:	
		$st->assign("模板中变量名称",php的变量名称); php向模板传递数据的。
		标量数据类型	
		assign() 可以传递所有的标量数据类型 string int float boolean;
		数组:
			索引数组可以assign传递		模板中  	$数组名称[下标] 或  $数组名称.下标
			关联数组可以assign传递 模板中显示 $数组名称[下标] 或  $数组名称.下标
		对象:
			assign()  模板中使用:  $对象->属性/方法（） 
	2> smarty 调用 css imgs js文件
		css imgs js 文件查找是从php文件出发的
		
		assign();   {}smarty定界符  可能会与 css js 产生语意混乱
		修改定界符:*********
			//修改smarty定界符
				$st->left_delimiter = "<{";  左边
				$st->right_delimiter = "}>";右边 
		
			
			
			
			
			
			
			
			
			
			
			
	

 	