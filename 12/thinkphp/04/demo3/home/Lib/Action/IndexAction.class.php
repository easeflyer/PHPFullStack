<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	//1> 实例化一个系统自带的数据库操作类
    	$ad = new Model("admin");
    	//2 > M()快捷方法实例化
    	//$ad = M("admin");
    	$rs = $ad->find(); //找到一条记录
    	print_r($rs);
    	echo "<br />--------333---------<br />";
    	$rows = $ad->select();// 多条记录.
    	dump($rows);
    }
}