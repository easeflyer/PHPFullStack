知识点：
	一 修改模板中变量的定界符
	二 tp连接数据库
	三 tp 对模型的操作（实例化模型）
	四 tp中查询的方法
	五 tp 更新操作   （修改 和 删除 添加）
	
	
一 修改模板中变量的定界符
	模板中传递变量
	在模板中 tp 默认的是 {}为定界符
	修改默认的定界符
		home/conf/config.php
		"TMPL_L_DELIM"=>"<{", 
		"TMPL_R_DELIM"=>"}>",

二 tp连接数据库 *****		
	C 调用配置文件文件中的内容
	补充:
		前后台都需要连接数据库。如果前台配置一次，后台配置一次 。
	
三 tp 对模型的操作（实例化模型）
	 名字  curd
	 c create  添加 $m->add();
	 u update 修改 $m->save();
	 r  read  读取（查询） $m->select();
	 d delete 删除 $m->delete();	
	 
	 1 模型进行实例化
	 		1> 实例化一个系统自带的数据库操作类
    	//$ad = new Model("admin");
		2 > M()快捷方法实例化
    	$ad = M("admin");
    	$ad - >find()  一条记录
    	$ad->select() 多条记录
    	dump($rows); 格式化的方式输出数组内容
    	3> 调用自定义类的步骤:
    		在 home/lib/Model/ CkModel.class.php
    		在IndexAction.class.php
    		调用自定的model
			    	$ad = new CkModel("admin");
			    	dump($ad->find());
			注意：tp本身创建方法已经能满足需求。
		4》 使用D快捷方法
			 $admin = D('admin');
		5> 实例化空模型
			$m = M();
			//调用 query 自己编写sql语句
			顾虑到有一些程序员的变成习惯的。sql优化
	
四 tp中查询的方法
	find()
	select();
	1 连贯操作
		where(条件)  order limit field("字段1，字段2，字段3") 
		order(字段  排序方式)
		limit(起始位置，长度) 如果只有一个参数，起始位置从0开始	
		$ad->where()->order()->limit()->select();
	2 如果相对多张表操作。 连接查询；
	$rs = $ad->table(array("表名"=>"别名","表名"=>"别名"))
    			->where("admin.aId=am.aId")->select();
    join() 方法默认是left  如果是right连接  right join
	$rs = $ad->join("think_admin_msg ON think_admin.aId = think_admin_msg.aId")
    			->select();	
	
	
五 tp 更新操作   （修改 和 删除 添加）	
	1>add方法 增加数据
	2>save方法 更新数据
	3>delete 方法 删除数据
	补充：
	4》query 用来执行select 语句 返回结果集。
	5>execute 用来写 增 删 该 操作的 返回受影响的记录数。
	
	
	
	
作业： 阅读：手册中  11 章节的内容。	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
		
		
		