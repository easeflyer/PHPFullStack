<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	header("content-type:text/html;charset=utf-8");
		echo "我是index的index模块的动作";
    }
    function demo(){
        echo "我是demo 方法";
    }
}