<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		echo "cccccccccccc";
    }
    function reg(){
    	if($_GET["id"]){
    		echo $_GET["id"];
    	}
    	echo "这是用户的测试页面,请注意";
    }
    function add(){
    	echo "这是添加数据的方法";
    }
    function verify(){
    	echo "这是调用验证码的方法";
    }
}