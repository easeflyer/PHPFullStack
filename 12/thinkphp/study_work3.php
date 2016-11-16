知识点；
	一 、 在控制其中如何调用模板
	二 、 模板替换与系统常量
	三、 其他模板知识
	四、 demo 布局网站的后台（页面 div css html 美工已经做好的）

一 、 在控制其中如何调用模板
	c: mvc 结构中的控制器  ==>Action
	thinkphp--> 项目目录/lib/action/控制器文件
	1 模板位置:
		项目目录 admin/Tpl/控制器名称的目录/模板文件(和方法名称同名).html
	2 控制器中调用模板
		$this->display(); //调用模板
	3 _initialize(); 类似于构造方法，在所有方法之前执行的一个方法。 [ɪ'nɪʃə.laɪz] 
	
二 、 模板替换与系统常量
	1 系统常量:
	tp 已经准备好的常量，提高代码效率。见手册附录(实验时注意缓存问题)
	__ROOT__ 网站根目录地址  
	__APP__ 当前项目（入口文件）地址  
	__URL__ 当前模块的URL地址  
	__ACTION__ 当前操作的URL地址  
	__SELF__ 当前URL地址  
	1 提高效率 2 不同的环境的适应性。同一个app他是常量，换一个环境值是变化的。
	2 模板替换
	项目中 正真路径 使用最多的是在模板中
		<a><img><link><script><form action="">
	用系统常量去替换 路径的相关部分。
	在模板里同样可以直接使用，并且不需要 php 代码标记

	__ROOT__ <br />
	__APP__ <br />
	__URL__ <br />
	__ACTION__ <br />
	__PUBLIC__ <br />  里面存放 css  js  imgs (ease:注意Public 的路径，权限Linux 安全考虑)
	表单提交  图片imgs  css js    是从 项目的根目录算起。********

	frameset 案例学员自行尝试。同理。
三、 其他模板知识
1 控制其中的变量 在模板中输出
	$this->assign("模板中的变量名称",php中的变量名称)
	模板中显示:
	{$模板变量名称}
	1》数据类型：
		string int float boolean
	2》 数组
	索引数组  {数组名称[下标]}
   关联数组  {数组名称["下标"]}  |  {数组名称.下标}
    3》对象
    	类文件： ThinkPHP/extend/library/ORG/目录/类名称.class.php
    	(ease:这里的类文件为：ThinkPHP扩展，并非项目相关，注意类文件的用途) 
		import("ORG.My.Test");导入 类文件  include
		{对象名称->属性|方法（）}******
		{对象名称:属性|方法名称()} (不推荐)

2 系统自定变量
	可以再模板中使用 参考Think 手册8.2
	$Think.get 获取$_GET {$Think.get.id} 
	$Think.post 获取$_POST {$Think.post.name} 
	$Think.cookie 获取$_COOKIE {$Think.cookie.username} 
	$Think.session 获取$_SESSION {$Think.session.user_id} 

3  模板中可以 使用php函数 参考手册 8.3
	{变量名称|函数}  了解，不建议，可读性不好，在逻辑和显示分离的基础上可以少用，以简化主程序逻辑。

4.运算符:	参考手册 8.5
	+ {$a+$b} 
	- {$a-$b} 
	* {$a*$b} 
	/ {$a/$b} 
	% {$a%$b} 
	++ {$a++} 或  {++$a} 
	-- {$a--}  或 {--$a} 
	综合运算 {$a+$b*10+$c} 


5 if else  参考手册8.21
	<if condition="条件 "> value1
	<elseif condition="条件2"/>value2
	<else /> value3
	</if>  比较符号参考手册 8.13
	注意：tp 的if条件  比较符号
	eq或者 equal 等于 
	neq 或者notequal 不等于 
	gt 大于 
	egt 大于等于 
	lt 小于 
	elt 小于等于 
	heq 恒等于   ===
	nheq 不恒等于  !==
	<if condition="$age gt 18 "> value1

6 循环:demo7
1>for
<for start="开始值" end="结束值" comparison="" step="步进值" name="$val" >
</for>
2>foreach 遍历数组****** 
	<foreach name="数组名称" item="val">
		{$vo.id}
		{$vo.name}
	</foreach>
3 >volist***** 
<volist name="数组名称" id="val">
	{$val.下标}
</volist>
volist 用于输出数据集，针对数据库。
foeach 相对简洁可以用于对象遍历 参考手册8.10

7使用技巧:
		1> 在模板中输出php代码  了解
			<php>
					php代码
		    </php>
		2>模板包含文件 demo9
		<include file="其他模板的文件名称" /> 不需要扩展名 参考8.8

	注意：如果包含的是其他模块下的页面
			Index/index.html
			Test/test.html
		<include file="Test:test" />

四、 demo 布局网站的后台（页面 div css html 美工已经做好的）
		1>index.html
    pro案例。直接拷贝模板，修改网址，而不是拷贝代码。








	















	














	




		
	
	
	
	
	
	
	
	
