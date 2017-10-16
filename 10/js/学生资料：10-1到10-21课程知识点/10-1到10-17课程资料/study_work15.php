知识点：
	一  json 语法
	二 js 如何解析和序列化 json
	
一  json 语法
	1 什么是json
		json 结构化的数据表示方式，轻量级的数据结构。
		注意：
			json 格式数据不是js特有的 ，其他语言都可以对json 进行序列化和解析。
			序列化： var obj = new Object();  对象 数组等数据转换成json结构的数据。
			解析:	 json结构的数据，转换成js可操作的数据，对象 数组 变量....
			json数据，其实是把其他各类型的数据 都转换成字符产，方便程序调用--》json 是一个字符串*****;
			<a href="b.php?id=aaaaaaaaa"></a>
			b.php  $id = $_GET["id"]
	2 json 格式：
		{键:值,键:值,键:值,键:值,键:值.......}
		json 在js中用3中方式表示
		1》基础类型  字符串 数值 布尔 null
		var str = '{"name":"zhangsan","age":18,"sex":true}';
		2》对象:
		var dt = {name:"zhangsan",age:100,success:function(){}};  
		alert(dt.age);
		或者：
		var dt1 = {"name":"zhangsan","age":100};
		注意：对象中的键值：属性
		3>数组：
			var arr = '[100,"lisi","nan"]';
			二维数组：
			[
				{
						"name":"aaaa",
						"age":18,
						.....
				}
				,{
						"name":"aaaa",
						"age":18,
						.....
				},.....]
		
二 js 如何解析和序列化 json	
	1> js数据转换成json格式的 数据;
			 JSON.stringify(arr)  把数据序列化成json结构
	2》解析：json结构的数据转换成普通js数据
			JSON.parse(data);
	 注意：在项目中，有些数据不好存储或者传递，可以吧这些数据 json结构化以后，变成字符串。
	 
		
		
		
		
		
		
		
		
			
	