<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    
    // ajax demo
    public function index(){
		$this->display();
    }
    function retData(){
    	echo "<h1>这是用来测试ajax</h1>";  //连接数据库 取得数据的值。
    }
    
    
    // S 缓存 demo
    function ct(){
        $a = "我是缓存数据1111";
        S("aaa",$a,20);//10秒
        $b = S("aaa");
        echo $b;
    }
    function tc(){
        // 超过10秒 重新读取，数据就没有了。
        echo "重新读取aaa:".S("aaa");
    }
    
    // cache（）   F()  缓存 demo
    function cacheSet(){
        cache("c1","这是用cache函数缓存的数据",10);
        F('f1','F函数缓存的数据没有有效期。');
        echo cache('c1');
    }
    function cacheGet(){
        // 超过10秒就无法读取了。
        echo "再次读取 c1 ：".cache('c1');
        echo "再次读取 f1 ：".F('f1');
        F('f1',null); // 再次刷新本函数， 缓存被删除
    }

    
    // 废弃 下面的案例 废弃，tp 3.2 以后已经不再使用。
    function testCache(){
        $Cache = Cache::getInstance();
        //$Cache->setOptions('temp','Public');
        //$Cache->uname = "lisi";
        $Cache->set('uname','lissi','60');
        echo $Cache->uname;
    }

    function getCache(){
        $Cache = Cache::getInstance();
        //$Cache->setOptions('temp','Public');
        echo $Cache->uname;
        echo $Cache->get('uname');
    }
}