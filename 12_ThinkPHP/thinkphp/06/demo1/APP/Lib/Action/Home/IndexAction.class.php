<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        
    	header("content-type:text/html;charset=utf-8");
        print_r($_GET);
		echo "<br />我是Index分组的Index模块的index动作";
    }
    function demo(){
        echo "我是demo 方法";
    }
    function test(){
        
        $this->display();
    }
}