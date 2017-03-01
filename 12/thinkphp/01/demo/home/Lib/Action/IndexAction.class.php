<?php
class IndexAction extends Action {
    public function index(){
        echo 333;
        echo "中文的情况";
    }
    public function reg(){
        echo 444;
    }
    
    public function demo(){
        
        $id = $_GET['id'];
        echo $id;
        $demo = new DemoModel();
        $p = $demo->getPrice();
        $this->assign("price",$p);
        $this->display();
    }
}