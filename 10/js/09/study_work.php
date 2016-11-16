知识点：
	一 js 对象的分类
	二 math对象
	三 string对象

一 js 对象的分类	
	1 内置对象：
		global对象
		Math 数学对象
	2 本地对象
		Array 数组对象********
		Number 数值对象
		String 字符串对象
		Boolean 
		Function 
		RegExp 正则对象**********
	3 特殊对象；
		DOM 文档对象模型
		BOM 浏览器对象模型
		
		
二 math对象
	主要是进行 数学方面相关运算的***
	var  n = 3; //默认创建math对象。n 
	1 abs()  Math.abs(参数) 求绝对值。
	2 Math.round(参数); 四舍五入  4.4  4.5
	3 Math.ceil()  进一取整   只要有小数， 整数+1,小数去掉
	   Math.floor() 舍一取整 只要有小数， 只要整数部分,小数去掉
	4 Math.random(); 取得0--1之间的随机数。
	5 max min 求一组数据中最大最小值。
	 		
三 string对象
	创建字符串对象
	var str = new String();
	var str = "aaa";		
	注意：以上两种写法都是一样的。
	var str= "abcdefghijklmn"; 每个字符都有一个位置 是从0开始的***;
	1 属性：
		length 字符串的长度。（字符个数） 
		位置 0--13.
		个数 14；
	2 方法:
		charAt(num); 返回num位置上的字符。
		indexOf(string) 查找string第一次出现的位置。 字符如果不存在，返回-1
		lastIndexOf() 返回字符最后一次出现的位置。
		replace() 将字符串的字符替换成其他字符
		substring(start,end) 截取字符串 从start开始，到end结束 （不包括结束位置）
						如果不指定结束位置，从开始位置接到字符串的末尾。
		substr(start,length) 从start截取length个字符，如果长度没有，截取到末尾。
		toLowerCase  用于把字符串 转换成小写
		toUpperCase 大写		
		split() 用固定的符号去 切割字符串。返回一个数组。	
						
练习:
	var file = "demo.class.php"; //如何获取扩展名。				
						
						
						
						
						
						
						
						
						
						
						
						
						
		
		
		
		
		
		