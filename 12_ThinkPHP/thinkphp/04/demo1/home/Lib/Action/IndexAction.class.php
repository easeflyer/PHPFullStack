<?php
class IndexAction extends Action {
    /*
     * 注意配置文件中，修改了定界符
     */
    public function index(){
    	$name = "zhangsan";
    	$this->assign("name",$name);
		$this->display();
    }
}