<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$name = "zhangsan";
    	$this->assign("n",$name);
    	
    	$arr = array("aaa","bbbb","cccc");
    	$this->assign("arr",$arr);
    	$brr = array("one"=>"aaa","two"=>"bbbb","th"=>"ccc");
    	$this->assign("brr",$brr);
    	
    	//import("ORG.My.Test");//导入类文件 (ease:这里的类文件为：ThinkPHP扩展，并非项目相关，注意类文件的用途)
    	$t = new TestModel();
    	//$t = D("Test");
        //print_r($t);
    	$this->assign("t",$t);    	
        $this->display();
    }
}