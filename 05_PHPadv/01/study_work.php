知识点：
	一 mysql函数库
	二 mysql 制作 用户的增删改模块
	三 需要打包 mysql函数库中的函数
	
	
一 mysql函数库
	php的函数，php中用来操作mysql数据库的函数。
	1 常用函数：
		1》 mysql_connect("主机名称/ip","用户名","密码")--->建立php---》mysql连接 返回资源
		2》 mysql_error(); 返回上一个mysql操作的文本错误信息;
				@ 错误抑制符号
		3》mysql_select_db("数据库名称",$link);  //use 数据库名称
		4》 mysql_query(); 向数据库发送一条sql命令，理解: 执行sql 。  返回资源
		5》 mysql_affected_rows() 取得前一条sql语句 返回受影响的行数。 insert update delete
		6》关闭数据库的连接  
			mysql_close($link);
		7> mysql_fetch_array(结果集,参数2); 从结果集中 返回 一条记录，（混合数组）
				MYSQL_ASSOC   ： 关联数组
				MYSQL_NUM:		索引数组
				MYSQL_BOTH: 混合数组
		8> mysql_fetch_assoc($result);  ==> mysql_fetch_array($result,MYSQL_ASSOC)
			关联数组
		9> mysql_fetch_row($result);  索引数组。
		10》 mysql_num_rows(); 获取 select语句执行后的结果集中的记录条数的。
		
二 mysql 制作 用户的增删改模块		
		
		练习：用户添加。
		用户列表  删除 修改
		分页的内容
			INSERT INTO `users` VALUES (12, 'zhangsanaaaa', '123456', '1', '13112345678', 'aa@aa.com');
			INSERT INTO `users` VALUES (13, '小张111bbbb', '1234567111', '2', '13212345678111', 'cc@aa.com111');
			INSERT INTO `users` VALUES (14, '小刘ccccc', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (15, '小军dddd', '123', '2', '13312345678', 'dd@dd.com');
			INSERT INTO `users` VALUES (16, '小明eeee', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (17, 'demoffff', '123456', '1', '134567890', 'ff@ff.com');
			INSERT INTO `users` VALUES (18, 'xuexigggg', '2345', '1', '1355555555', 'ee@ee.com');
			INSERT INTO `users` VALUES (19, 'zhangsanhhh', '123456', '1', '13112345678', 'aa@aa.com');
			INSERT INTO `users` VALUES (20, '小张111iiiii', '1234567111', '2', '13212345678111', 'cc@aa.com111');
			INSERT INTO `users` VALUES (21, '小刘jjj', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (22, '小军kkk', '123', '2', '13312345678', 'dd@dd.com');
			INSERT INTO `users` VALUES (23, '小明llll', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (24, 'demommm', '123456', '1', '134567890', 'ff@ff.com');
			INSERT INTO `users` VALUES (25, 'xuexinnnn', '2345', '1', '1355555555', 'ee@ee.com');
			INSERT INTO `users` VALUES (26, 'zhangsanqqqqq', '123456', '1', '13112345678', 'aa@aa.com');
			INSERT INTO `users` VALUES (27, '小张111ooo', '1234567111', '2', '13212345678111', 'cc@aa.com111');
			INSERT INTO `users` VALUES (28, '小刘pppp', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (29, '小军wwww', '123', '2', '13312345678', 'dd@dd.com');
			INSERT INTO `users` VALUES (30, '小明eee', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (31, 'demorrrr', '123456', '1', '134567890', 'ff@ff.com');
			INSERT INTO `users` VALUES (32, 'xuexittt', '2345', '1', '1355555555', 'ee@ee.com');
			INSERT INTO `users` VALUES (33, 'zhangsanyyyy', '123456', '1', '13112345678', 'aa@aa.com');
			INSERT INTO `users` VALUES (34, '小张111uuuu', '1234567111', '2', '13212345678111', 'cc@aa.com111');
			INSERT INTO `users` VALUES (35, '小刘zzzzz', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (36, '小军1111', '123', '2', '13312345678', 'dd@dd.com');
			INSERT INTO `users` VALUES (37, '小明222', '1234567', '2', '13212345678', 'cc@aa.com');
			INSERT INTO `users` VALUES (38, 'demo333', '123456', '1', '134567890', 'ff@ff.com');
			INSERT INTO `users` VALUES (39, 'xuexi4444', '2345', '1', '1355555555', 'ee@ee.com');
			
三 需要打包 mysql函数库中的函数
		1 . 常用办法：打包class 
		2. 打包成 function ****	
		
练习:  mysql.fun.php 代码 3次
		
		
		
		
		
		
		
		