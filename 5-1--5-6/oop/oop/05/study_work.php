知识点：
	一 、 封装关键字 public  private protected
	二 、 封装函数 __set() __get();
	
一 、 封装关键字 public  private protected
	封装关键字: 限定 属性和方法的访问范围，把属性和方法都隐藏起来。
	都可以修饰属性和方法。
	public 全局: 类的内外都可以访问,子类中也可以访问。
	protected 受保护的,  类外不能访问 类内部可以访问。子类也可以访问。
	private 私有的  类外部不能访问, 本类中可以访问。子类 也不可以访问。
	
	应用范围:
		1> 封装关键字:  属性 和 方法 private 提高安全。
		2》 在继承中:  子类的访问权限 不大于 父类的相关权限
	class test{
		protected function demo(){
		
		}
	}	
	class  son extents test{
		public fucntion demo(){
			
		}
	}
	建议： 一般情况下 ，所有的属性和方法 都定义成private 

二 、 封装函数 __set() __get();
 __set(): 对似有属性进行赋值
 __get();对似有属性进行取值。
 破坏了似有属性类外不能访问的特征。
 
 __set() ： 是在对象调用似有属性的时候，自动调用的内容















	
	
	
	