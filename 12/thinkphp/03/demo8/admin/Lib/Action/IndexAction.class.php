<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
            $c = 5;
		$arr = array("aaaa","bbbb","cccc","dddd");
		$this->assign("arr",$arr);
		$brr = array(
			array("name"=>"zhangsan","pwd"=>"111","age"=>18),
			array("name"=>"lisi","pwd"=>"222","age"=>20),
			array("name"=>"wangwu","pwd"=>"3333","age"=>22)
		);
		$this->assign("brr",$brr);
                $this->assign("c",$c);
    	$this->display();
    }
}