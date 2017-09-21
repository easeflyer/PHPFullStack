<?php
header("content-type:text/html;charset=utf-8");

class test{
	public $name = "zhangsan"; //默认值
	public $age = "18";
        
	function __construct($n,$a){  //对属性进行初始化
		$this->name = $n;
		$this->age = $a;
                
		echo $this->name;
		echo $this->age;
	}
	function demo(){
		//如果 有构造方法赋值，引用新值，如果没有赋值，引用属性的默认值。
		echo $this->name;
	}
	function __destruct(){  //回收垃圾
		//释放属性
		$this->name = NULL;
		$this->age = NULL;
	}
}

class test1 extends test{
    function __construct($n,$a){
        parent::__construct($n, $a);
    }
}




$na = "jack";
$age = 20;

$t = new test($na,$age); //如果test有构造方法，实例化 new 自动
						  //调用__construct()方法。
						  //构造方法的参数 必须在实例化的时候传递
//$t->demo();						  

//对象就使用完毕； 自动调用destruct()去释放内存空间。
//手工释放:   unset($t);
//$t = null;
echo "<hr />";
$t1 = new test1("aaa",22);












