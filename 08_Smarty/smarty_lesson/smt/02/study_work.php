知识点:
	一 smarty基础知识:
	二 自定义函数 smarty 模板中的函数
	
一 smarty基础知识:
	1 模板中的注释符
		css  /* 内容*/
		php  //   /**/
		smarty <{*注释内容*}>
	2 smarty变量分配:
		index.php -->index.html
		1> assign("模板中变量名称",php变量名称);
		2>配置文件定义变量
			$st->setConfigDir("conf/");  // configs 设置配置文件的目录
			配置文件  configs/config.conf 文件
					配置文件中的配置项目   键（自定义的变量名称）=值
					<{config_load file="url"}> 注意: configs/
					调用配置项
						<{#键名#}> 
						注意：配置项中 如果有整数 ，数值过大，产生数值溢出。
					配置文件 一般用来 网站上固定不变的信息:
						icp   企业邮箱 企业客服电话....
			技巧:
				按照页面指定配置项:
					<{config_load file="url" section="index"}> 注意: configs/
					
	
		练习：
		配置smarty的config文件  
		6个变量   在 index.html demo.html中分别访问一次。
		3>smarty中的变量
			$_GET
			$_POST				
			$_SESSION
			$_SERVER
			$_COOKIE
			$_ENV		
		<{$smarty.数组名称.下标}>
		阅读:  第二模块中  4小节
	3>变量修饰符: 是对变量的补充说明  了解
	模板中使用
	<{$变量名称|变量修饰符}>
	 cat 连接多个变量   . 
		<{变量名称|cat:"连接的目标内容"}>
	 date_format 格式化日期
	<{变量名称|data_format:"字符串格式"}>
	php.ini
		date.timezone =   前面;去掉   PRC
		date_default_timezone_set("PRC");
		
  3 smarty中的自定义函数
  	 1》 变量修饰符
  	 		$st->registerPlugin(类型, 模板中调用的函数名称, php中调用的函数名称)	；
  	 		$st->registerPlugin("modifier", "fun1", "fun1");
	 2》自定义单标记 
	 		$st->registerPlugin("function", "demo", "fun2");
	 3》自定义双标记
	 		$st->registerPlugin("block", "test", "fun3");
		
	  4》修饰符 单标记 双标记 以插件的形式定义到smarty
	  		插件定义步骤:
	  			插件的位置 
				项目目录/Plugin/插件文件:
				插件文件命名：
						变量修饰符插件:  modifier.变量修饰符.php
						自定义单标记插件:function.单标记名称.php
						自定义双标记插件:block.双标记名称.php
				插件中函数名称:
						变量修饰符: function smarty_modifier_变量修饰符(){}
						自定义单标记: function smarty_function_单标记名称(){}
						自定义双标记: function smarty_block_双标记名称(){}
				插件当中的参数:
						变量修饰符: function smarty_modifier_变量修饰符($var){} $var  变量内容
						自定义单标记:  function smarty_function_单标记名称($arr,[$smarty]){}
						自定义双标记:  function smarty_block_双标记名称( $params,   $content,   $template,   &$repeat ){}
	
				smarty编写插件的案例
					
						$st->addPluginsDir("Plugin/"); 添加插件的位置 从项目目录开始查找
	
						变量修饰符插件:
						自定义单标记插件:
						自定义双标记:
练习:
	自定义  变量修饰符 单双标记 3次	
			
	4. 内置函数: smarty 已经定义好的函数  
			php str_replace substr.....
			1> {append}可以在 运行时 为数组变量增加或者创建值。
			$arr = array("aaaa","bbbb","cccc");
			$arr[4] = value;
			<{append var="arr" value="zhangsan"}>
			或
			<{append "arr" “zhangsan”}>	可读性 较差 不推荐
			2>{assign}用于在模板运行期间赋值给变量. 	
			<{assign var="str" value="我很爱国"}>
			索引数组赋值:
				<{assign var="brr" value=[11,222,333]}>
				<{$brr[1]}>
				注意 ：
				数组赋值时 ，value属性 不加 ""
			关联数组赋值:
				<{assign var="crr" value=["un"=>"zhangsan","ua"=>18,"ul"=>178]}>
				<{$crr["ua"]}>
			3>{if},{elseif},{else}
				<{if 条件}> 条件 比较运算符  用字符代替
					eq  == 
					neq !=
					gt  >
					lt  <
					gte >= 
					lte <=
					not !
					mod %
					===
					
					<{if $a gt 3}>
			4> {for $var=$start to $end step $step}指定步长的循环
				var 变量名称
				start 起始值
				end 终止值
				step $i ++  默认 步长1
			
			5> 模板中自定义函数
				模板中定义函数的格式:
					<{function name="函数名称***" [key="val" key="val"]}>
						函数体(变量修饰符  自定义标签 ，以及smarty所有涵盖内容)
					<{/function}>
					调用:
						<{函数名称 [key=val key=key]}>
					
					带参数的函数定义:
						<{function name="demo1" uName="zhangsan" uAge="18"}>
								姓名是:<{$uName}><br />
								年龄: <{$uAge}><br />
						<{/function}>
						<{demo1 uName="123" uAge="456"}>
					注意:
						调用函数的时候  ，参数可以和定义函数的时候的参数名称不一致。
						如果不一致，就必须 按照调用函数时候的参数 名称去调用*****
	练习:
		demo7 当中 案例 敲3次
			6》模板中遍历数组 函数
				foreach
					<{foreach 数组名称 as 元素值}>
						遍历的内容
					<{/foreach}>
					注意; foreach 遍历二维数组，$val每一次指向都是一个一维数组，值: $val["下标"]  $val.下标
				section	
					<{section name="section的名称" loop="用于循环的值"}>	
						循环内容
					<{/section}>
					 loop="用于循环的值" ==> 数组名称
					name="section的名称"==》数组下标
					section  遍历二维数组的时候，第一维是一个索引数组
			7》smarty模板引擎中的包含文件
				{include}用于载入其他模板到当前模板中
				file="模板URL" 被包含文件名称
				注意：被包含页面，可以正常接收和显示包含文件的变量****
				<{include "head.html"}>
			8》模板的继承
				 模板：
				 	你可以在子模板内使用{extends}标签来扩展父模板		
				 	
				 	parent.html 父模板
				 	son.html 子模板
				 		<{extends file="parent.html"}>	
		
					
						
						
						
						
						
						
						
						
						
						
						
	
		