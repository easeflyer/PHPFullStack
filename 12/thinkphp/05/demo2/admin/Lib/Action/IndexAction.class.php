<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		//默认session 开启的。
		//传统的方式:
			//$_SESSION["name"] = "zhangsan";  //跨页面 超全局变量 保存的用户信息
		//tp提供的方式
			session('name','lisi');   //  ==> $_SESSION["name"] = "lisi";
    }
    function demo(){
    	echo $_SESSION["name"];
    }
    function test(){
    	$this->display();
    }
    
}