<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$_SESSION["uInfo"] = "aaaaaaaaaaaa";
    	echo $_SESSION["uInfo"];
    	
    	$a = 12;
    	$b  = 10;
    	$this->assign("a",$a);
    	$this->assign("b",$b);
		$this->display();
    }
    function demo(){
        $_COOKIE['ck1'] = "ck1aaaaaa";
    	$this->display();
    }
}