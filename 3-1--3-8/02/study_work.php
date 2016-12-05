知识点：
	一 php文档的语法结构
	二 php中的注释
	三 php中的变量
	四 php中的数据类型
	
一 php文档的语法结构 
	.php ---> html div css php mysql js jquery ajax 
	php定界符:
	1 标准定界符   xml风格 常用 *******
	<?php 
		php代码
	?>
	2 短标记
		<?
			php代码
		?>
	了解:
	3 asp风格
	<%
		php代码
	%>	
	4 script
	<script language="php">
		php代码
	</script>
	php定界符 可以写在页面的任意位置。
	
	注意：
	 php代码严格区分大小写。
	 php代码每行都要以";"结尾
	
	
二 php中的注释
	注释: 对代码起解释说明。	写在php的定界符之内
	单行注释符 :  // 注释内容
	多行注释符: /*  注释内容 */
	
三 php中的变量
	变量: 值存储在内存中 有名称的信息。变量可以随着程序的执行而变化
	1 定义变量:
		x=3 把3的值赋给 x
		$变量名称 = 值;   //$变量名称 声明变量        = 值; 赋值
	2 变量名称
		 $ 开头
		 $ 之后的第一位  字母 _   $ab   $cd   $1c  $*abc
		 第二位之后 可以有数字 字母  _    $a_1   $user_123  $user_?
		 习惯:  变量名称 有含义  而且 第二个单词以后 单词首字母大写"驼峰命名"
		 			$userName   $telInfoPrice 
		 			
		 $userAge = 18;
		 $userSex = 1;
		 
		 echo 打印内容
		 echo  $变量名称/值
	3 预定义变量
	传值中接受数据变量
		$_GET   数据量下 不安全            			经由HTTP  GET方式来传递数据的      
		$_POST   数据量大 安全 						经由HTTP  POST方式来传递数据的      
		$_REQUEST   $_GET+$_POST 效率低
		$_FILES   上传变量								经由HTTP  POST方式来上传文件
	会话:	
		$_SESSION    在服务器端保存数据
		$_COOKIE	  在客户端保存数据
		
		$_SERVER  系统的环境信息
		
		
四 php中的数据类型
	$a = 3;		
	php 8中数据类型:
		基础数据类型（标量类型）
			字符串 string
			整型  integer
			浮点型 float
			布尔型 boolean
		复合类型
			数组 array
			对象 object
		特殊类型:
			资源 resource
			空值  null 没有值 
			
	1.	基础数据类型（标量类型）
			字符串 string
					""   '' 之内
					$str = "abcdefg13";
					"" '' 区别  ""好中的代码会执行 ‘’中的代码不会执行 按照普通字符输出。
					转义字符:   \
						普通字符   <=======>    控制符（字符）
						普通--》控制
						\n 换行
						\r 回车
						\t 水平制表符
						\f 换页
						控制符---》普通
						"      \"
						'	   \'
						<    \<
				整型：整数  十进制 八进制 16进制 
					$a = 123; 整数不带 引号
					正整数 负整数 0
				浮点型: 小数  
				布尔型:  true  1   false  0  对错 真假
					打印的时候 false 空 *****
				
			
		2 复合类型
			数组 array
			对象 object
		特殊类型:
			资源 resource
			空值  null 没有值 	   声明变量    赋值""   unset(变量名称)
			
			 var_dump(); 结果 返回变量的数据类型的。
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		
		
		
		
