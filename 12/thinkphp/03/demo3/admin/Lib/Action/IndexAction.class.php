<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	//url 的系统常量
		echo "__ROOT__ :". __ROOT__ ."<br />";
		echo "__APP__ :".__APP__ ."<br />";
		echo "__URL__ :".__URL__ ."<br />";
		echo "__ACTION__ :".__ACTION__ ."<br />";
		echo "__SELF__ :".__SELF__ ."<br />";
		echo "__PUBLIC__" . __PUBLIC__ ."##########";
		$this->display();
    }
}