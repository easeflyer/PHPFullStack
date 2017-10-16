知识点:
	一  file_put_contents() file_get_contents();
	二 正则表达式 *****
	
一  file_put_contents() file_get_contents(); 文件操作的。
	fopen
	fwrite
	fclose
	fread
	.....
	file_get_contents — 将整个文件读入一个字符串
	string file_get_contents ( string $filename)
	file_put_contents()将一个字符串写入文件
	int file_put_contents ( string $filename , string $data  )
	
二 正则表达式
	1.正则基础（介绍）
	2 正则中的元字符
	3 正则表达式中的运算顺序以及模式修正符
	4 常用正则（在公司中使用）
	
	1.正则基础（介绍）
		1》 什么是正则
			在字符串处理的时候，查找 匹配 替换功能时候，使用正则。
			正则是用来查找 匹配 替换字符串的规则。
			主要作用: 查找 匹配 替换。
		2》php中 两个常用的正则函数
			preg_mathc()执行一个正则表达式匹配 ******
			int preg_match ( string $pattern , string $subject [, $array])
			返回的是匹配次数: 0 没有 1 有，在第一次匹配成功后， 停止搜索。
			ereg()正则表达式匹配
			int ereg ( string $pattern , string $string [, array &$regs ] )
		3》正则中的元素：
			原子: 普通字符 0-9 转义字符 \ 原子表中对应的内容
			元字符： 特殊符号: *  ？  $ .....
			模式修正符(了解): 用固定的字符 表示特定的含义，正则 补充说明的。
		4》原子:普通字符:
			
			 正则格式: "/正则表达式/【模式修正符】";
			 a-zA-Z0-9  普通字符。
			 （abc）(abd) 内容看成整体，而且会把括号中的内容写入 数组的1......
			 				注意：（）中的内容 如果后边还用，\\1 反向引用。
			 [] :   [a-zA-Z0-9_]  或
			 		[^abc]  ^a或^b或^c abc以外的字符
			 		[^0-9]
			 		
			 转义字符:	
			 	\d  ==>  [0-9]
			 	\D ===> [^0-9]
			 	\w ===>[0-9a-zA-Z_]
			 	\W===》特殊符号
			 	
			 	注意：都可以匹配一个字符  （a）[a-z]\d \w 匹配1个字符。
			5>元字符:有特殊含义的符号
		* 匹配 前一个内容0次或多 任意多次
		. 匹配换行意外的任意一个字符
			注意： .* 任意字符的任意多次。
		+ 匹配前一个内容 1次以上
		? 匹配前一个内容0  1次
		|  或
		^  开头   [^ 取反]
		$ 结尾
			moon开头  moon结尾   //  ^moon$  ==》 只匹配moon本身
		{m}  前一个内容  m次
		{m,} 前一个内容 至少m
		{m,n} 前一个内容 至少 m  至多n次
			
	2 案例:
		//2012-2-3
	3 模式修正符:对正则表达式进行增强和补充。
		格式： "/正则表达式/模式修正符";
		i ： 正则不区分大小写
		m：在匹配行首或尾部内容的时候才用多行识别。
		x:忽略 正则中的空白
		A：强制从头开始匹配
	5 正则的 替换:
		str_replace()
		preg_replace()执行一个正则表达式的搜索和替换
		mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject )
											正则							替换的内容					字符串
			在字符串中，查找与正则匹配的内容  替换成 替换的内容
		

	6 常用:
		注册或登录时候。










