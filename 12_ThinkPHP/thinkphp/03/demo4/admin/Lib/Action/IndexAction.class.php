<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }
    function add(){
    	$un = $_REQUEST["un"];
    	echo $un ;
    }
    function info(){
        echo $_GET['un'];
    }
}