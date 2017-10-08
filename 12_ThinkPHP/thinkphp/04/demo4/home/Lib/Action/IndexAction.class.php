<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	//3 >调用自定的model
     	$ad = new CkModel("admin");
     	dump($ad->find());
     	echo $ad->test();
    	//4> D
        echo "<br />-------------------D函数--------------------------------";
    	$ad = D("Admin");
        //$ad = new AdminModel();
        //$ad = Model("admin");
    	dump($ad->select());
        echo $ad->test();
    	 //5 实例化一个空模型 
        echo "<br />-------------------M函数--------------------------------";
     	 $m = M(); 
     	 $rs = $m->query("select * from think_books");
     	 dump($rs);
    }
}