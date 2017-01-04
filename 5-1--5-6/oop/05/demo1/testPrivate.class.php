<?php
class testPrivate{
	private $name = "lisi";
	private $sex = "nan";
	private function demo(){
		echo "aaaa";
	}
	protected function demo1(){ //共有方法 调用了一个私有方法。
		$this->demo();
	}
}
$pr = new testPrivate();
//echo $pr->name;  不允许访问
//$pr->demo1(); // 允许访问
class testSon extends testPrivate{
	function demo3(){
		//echo $this->name;  //不可以访问。
            $this->demo1();  // 可以访问 demo1 被继承了
	}
        public function demo1(){echo 111;}
}
$s = new testSon();
$s->demo3();
