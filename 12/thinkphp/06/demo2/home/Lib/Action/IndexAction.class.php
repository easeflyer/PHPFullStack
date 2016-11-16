<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
			$num = $_GET["n"];
			if($num<10){
				$this->success("操作成功",U("index/demo"));
			}else{
				$this->error("操作失败",U("index/er"));
			}
    }
    function demo(){
    	echo "ok";
    }
    function er(){
    	echo "no";
    }
}