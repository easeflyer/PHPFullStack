<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$ad = M("admin");
    	//**1连贯操作 操作单表
    	//$rs = $ad->find();
    	//$rs = $ad->select();
    	//$rs = $ad->where("aId=3")->select();
    	//$rs=$ad->order("aId desc")->select();
    	//$rs = $ad->field("aId,aName")->order("aId desc")->limit(1,2)->select();
    	//print_r($rs);
    	//2**操作多张表
    	//$rs = $ad->table(array("think_admin"=>"admin","think_admin_msg"=>"am"))
    	//		->where("admin.aId=am.aId")->select();
    	$rs = $ad->join("think_admin_msg ON think_admin.aId = think_admin_msg.aId")
    			->select(); // left join ,right join
    	//print_r($rs);
        dump($rs);
    	
    }
    // add
    function ti(){
    	$ad = M("admin");   	
    	$data["aName"]="zhaoliu";
    	$data["aPwd"]="33333";
    	$ad->add($data);
    }
    // save
    function up(){
    	$ad = M("admin");   
    	$data["aName"]="我很爱国";
    	$ad->where("aId=3")->save($data);
    }
    // del
    function del(){
   	$ad = M("admin");   
   	$ad->where("aId=3")->delete();	
    }
    // read
    function qu(){
    	$ad = M("admin");   
    	$sql = "select * from think_admin"; //sql语句中 表名必须是全称
    	$rs = $ad->query($sql);
    	print_r($rs);
    } // exec
    function exes(){
    	$ad = M("admin");   
    	$sql = "insert into think_admin(aName,aPwd) values('aaaa','88888')";
    	$ad->execute($sql);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}