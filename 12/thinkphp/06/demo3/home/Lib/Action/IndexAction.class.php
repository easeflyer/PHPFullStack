<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }
    function retData(){
    	echo "<h1>是用来测试ajax</h1>";  //连接数据库 取得数据的值。
    }
    
    function ct(){
        $a = "我是缓存数据1111";
        S("aaa",$a,10);//10秒
        $b = S("aaa");
        echo $b;
    }
    function tc(){
        echo "aaa:".S("aaa");
    }
}