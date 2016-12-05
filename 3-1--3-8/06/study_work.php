知识点:
	一 常量
	二 文件上传 


一 常量：固定不变的量
	1 系统常量:
		PHP_OS 操作系统
		PHP_VERSION php版本
		PHP_SAPI php运行方式
	2 自定义常量
		$a = 3; //自定义变量:
		格式:define("常量名称","常量的值");	
		常量名称 全大写 习惯
		用法: 网页上固定不变的内容: 
		define("ICP","010001");
		define("EMAIL","aa@aa.com");
	3 魔术常量
		__FILE__ ;  当前文件的物理路径 *****
		__LINE__; 当前行号
		__FUNCTION__  当前的函数名
		__CLASS__ : 当前的类名
		__METHOD__ 当前方法名称	
		
二 文件上传:		
	form  enctype="multipart/form-data" 指定的编码方式
	Array ( 
	[name] => test.jpg 		文件的名称
	[type] => image/jpeg	文件的mime类型
	 [tmp_name] => C:\Windows\temp\php6F.tmp 文件临时文职 
	 [error] => 0 		错误信息   0 ok   1 上传的文件操作php.ini指定的文件大小 2 3 4  6  7  
	 [size] => 9773  文件大小
	 )
	 move_uploaded_file(临时位置,指定的位置)
		
		
		
		
		