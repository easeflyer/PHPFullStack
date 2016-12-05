知识点：
	一 、 抽象方法
	二 、 接口的应用
	
一 、 抽象方法
	1》抽象概述
		抽象：现实事物的概括。
			oop的变成中也引入抽象的概念。可以修饰方法和类 
	2》抽象关键词 abstract
		 abstract是用来修饰方法和类
		 		抽象方法和抽象类。
	3》抽象方法和抽象类的定义
		 抽象方法：没有方法体的方法。
		 		function demo(){
		 				方法体；
		 				return ....
		 		}
		 	格式：
		 		abstract function 方法名称();	  ????
		  抽象类: 类中可以没有抽象方法，也可以包含抽象方法。
		  	 格式：
		  	 	abstract class 类名称{
		  	 			
		  	 	}
		  	 注意：抽象类不能实例化。
		  	 			抽象类 声明一个规范。被子类去继承。
	4》抽象方法和抽象类的使用规则
		   注意： 
		   	不能被实例化，只能被继承
		   	子类必须重写父类的所有抽象方法。
	5》抽象方法的应用：
		抽象方法，企业中用来约束规则。
		项目经理
			abstract class total{
				//zhangsan
				abstract function  demo1(); //连接数据库
				abstract function  demo2();//执行sql
				abstract function  demo3();//获得数据库记录数
				//李四
				abstract function  demo4();//???
				abstract function  demo5();
				abstract function  getInfo();
			}		
		zhangsan 
			getInfo
		lisi	
			function getInfo？？

二 、 接口的应用
	1>认识接口
		接口： 现实中 是从应用的角度 来定义接口  支付宝接口  api接口...
					oop  接口是一种特殊的抽象类。方法全部都是抽象方法，属性全部都是常量  
		接口和抽象类的区别:
			抽象类:
				1  类中可以有普通方法和抽象方法
				2  abstract 定义抽象类
			接口
				1  类中全都是抽象方法
				2 interface 来定义接口
				3 属性必须都是常量
		 经常出面试题*****
		 
		 接口是一种特殊的抽象类*****
		 
		 接口和抽象类的共同点
		 	1 都不能被实例化，都需要继承
		 	2 所有的抽象方法都必须被重写。
		
	2》创建接口  interface 定义接口
		 interface 接口名称{
		 	const ....
		 	function 方法名称();
		 	function 方法名称();
		 	function 方法名称();
		 	.......
		 }
		 接口 方法全部都是抽象方法，方法省略abstract
		
	3 》接口的应用规范
		接口必须被继承使用。
		接口的继承 extends ----》接口的引用  implements 引用
		extends 类继承 单一 继承
		A 接口是多引用
				类引用接口 :多引用
				class test implements demo,demo1......
		B 类引用接口，必须全部重写接口中的方法。
		C  接口的引用可以和继承并存,先继承后引用
			class 类名 extends 父类 implements demo,demo1,....{}
		D 接口继承接口
			interface son extents demo1{}
实操：
	1 总结 抽象类 和接口的异同。
	2 demo demo1 中index 2个案例  3次。

学会之后：
	和同事很好配合工作。
	
	
	
	
	
	
	
	
	
	
	
	