知识点：
	一 oop 常用关键字  final self static const
	二 php常用的魔术方法   __开头
		__call()
		__clone()
		__sleep()
		__wakeup()
		......
	
	
一 oop 常用关键字  final self static const
	1 final 
		作用: 用来修饰类和方法的。不能修饰属性，
				如果父类方法用final 修饰，该方法不能被子类重写（覆盖），
				如果final 修饰类 该类不能被继承。
		限定类和方法的使用范围的。
		
	2 final 修饰类
		final class 类名{
		
		}
	3 final 修饰 父类中方法；
	final function 方法名称   不能被重写。
	
	4 self:关键字:	与$this类似，通过类名访问当前类中的内容。
		一般用来访问静态成员static或常量const	
		self::static成员
		self::const成员
	5 static 成员:  静态成员:	
		1>static 用来修饰属性和方法。
		2》static 修饰的内容，认为是类的内容，所有的对象均可访问，在第一个次加载的时候，
			加载到内存中的数据段中。
	
			静态成员 ：类内部访问
						self::属性
						类名称::成员名称。
			类外部访问:
				类名称::成员名称
	
		静态成员与对象无关。所有的内容只要调用static 成员，都具有连续性。
	
	
		6: const: 类中 定义常量。
			define("常量名称",value);
			格式:
				class 类名{
						const NAME;  //常量要全部大写。
					
				}
				注意：
					常量名称要全大写。
					访问常量  self::常量名称  类名::常量名称
					常量不能用 $this 来访问
					习惯：常量在定义时候一般给出默认值。
	
练习:
	构建一个类:
		姓名  年龄  性别 都是static
		echoName
		echoAge
		echoSex
		分别打印姓名 年龄，性别。
	笔记: 摘抄到一张纸上  作用，访问形式

二 php常用的魔术方法   __开头
魔术方法: 系统提供  __开头，都是系统自动在某些情况下 会自动调用的方法。
	__construct
	__destruct
	__set
	__get
	__call(funName,arr)	:如果对象调用不存在的方法，会自动调用__call();用来处理 自定错误。
	参数解释：
		funcName:不存在的那个方法名称
		arr  参数组成数组
	__toString() 读取该类的对象的字符串表现形式；
	__clone(); 复制对象  了解
	
	了解:
	__sleep(); 在序列化的时候自动调用，对象部分序列化。
	__wakeup() ; 反序列化的时候自动调用
	__autoload(); 自动加载类  *** mvc框架 ， __autoload();


练习:
	demo6  3次；

	
实操：
	demo1 demo2 final static const selft 3次
	demo5 demo6 3次
	

	
	
	
		
		
		
		
		
		
		
		





