知识点:
	一 数组的定义
	二 数组函数
	
一 数组的定义
	1 数组：变量存储的有序序列
		$数组名称 = 数组的定义;// 2种形式
		php中的数组包括2中数组类型
			索引数组:
			关联数组:
	//------------------------------------------------------------	
	2. 索引数组:	下标为数字的数组。
			$数组名称[下标]  下标 从0开始的数字，根据数字的不同，值不同
			直接定义:
				$arr[0] = 123;
				$arr[1] = "zhangsan";
				$arr[2] = "man";
				$arr[3] = "china";
			
			print_r() 打印变量的信息。 	打印数组的 结构
			count() 计算数组元素个数
			用array关键字定义
				$brr = array(123,"zhangsan","man","china");
	3 关联数组:	下标为字符串的数组
			$数组名称["下标"]
			直接定义
				$crr["one"] = "中国";
				$crr["demo"] = "美国";
				$crr["test"] = "法国";
				$crr["un"] = "英国";
			用array关键词定义
				$drr = array("one"=>"中国","demo"=>"美国","test"=>"法国","un"=>"英国");
				
		问题:
			索引数组中 下标不连续, 索引数组下标可以不连续
		
	4 二维数组:
		格式:
			$frr = array(
								array("zhangsan",18,"man"),
								array("lisi",15,"man"),
								array("wangwu",16,"woman"),
								array("zhaoliu",17,"woman"),
						);
			引用:
				$数组名称[第一维下标][第二维下标];
	//--------------------------------------------------
	5 foreach 循环 遍历数组
		格式:
			foreach （数组名称 as  $key=>$val）{
					循环体
			}
			$key  依次遍历数组的下标
			$val  依次遍历数组的值
			遍历：访问到数组中的每一个元素。
		
二 数组函数
	count    int count(array  $arr); 返回数组的元素个数。	
	explode 	array explode ( string $separator , string $string )		 使用一个字符串分割另一个字符串
	join  string join(string $flag,array $arr); 返回 flag 连接arr 组成的字符串。 implode  别名
	array_values  array array_values ( array $input ) 返回数组中所有的值  组成的新的索引数组。
	array_keys 		array array_keys ( array $input ) 返回数组中所有的键名 组成的新的索引数组。
	array_pop  mixed array_pop ( array &$array ) 删除数组的最后一个元素，返回最有一个元素的值 
	list 			void list ( mixed $varname , mixed $... )  把数组中的值 赋给对应的变量
					对关联无效 。 对索引有效。
					
	next 下一个元素
	prev  上一个元素
	end   最后一个元素
	in_array()  bool in_array ( mixed $needle , array $haystack  ) 检查数组中时候含有某个值
	array_reverse 			array array_reverse ( array $array )  翻转数组
	
	额外: 冒泡排序:
		1> 交换数组中的两个元素的值:
	面试：冒泡排序的程序:
	练习: 冒泡排序程序 3次。
				
			
			
			
			
			
			
			
			
		
		