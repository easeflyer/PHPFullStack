<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	//3 >调用自定的model
//     	$ad = new CkModel("admin");
//     	dump($ad->find());
//     	echo $ad->test();
    	//4> D
//    	$ad = D("admin");
//    	dump($ad->select());
    	 //5 实例化一个空模型 
     	 $m = M(); 
     	 $rs = $m->query("select * from think_admin");
     	 dump($rs);
    }
}