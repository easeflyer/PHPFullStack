<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$ad = M("admin");
    	//**1连贯操作 操作单表
    	$rs = $ad->find();
        print_r($rs);
        echo "<br />-----------------------------find-------------------------------------<br />";
    	$rs = $ad->select();
        dump($rs);
        echo "<br />------------------------------select------------------------------------<br />";
    	$rs = $ad->where("aId=10")->select();
        print_r($rs);
        echo "<br />-------------------------------order-----------------------------------<br />";
    	$rs=$ad->order("aId desc")->select();
        print_r($rs);
        echo "<br />--------------------------连贯操作----------------------------------------<br />";
    	$rs = $ad->field("aId,aName")->order("aId desc")->limit(1,2)->select();
    	print_r($rs);
        echo "<br />---------------------------内连接---------------------------------------<br />";
    	//2**操作多张表
    	$rs = $ad->table(array("think_admin"=>"admin","think_admin_msg"=>"am"))
    			->where("admin.aId=am.aId")->select();
        dump($rs);
        echo "<br />---------------------------join---------------------------------------<br />";
    	$rs = $ad->join("think_admin_msg ON think_admin.aId = think_admin_msg.aId")
    			->select(); // left join ,right join
    	//print_r($rs);
        dump($rs);
    	
    }
    // add   执行方法，然后phpmyadmin 查看数据变化
    function ti(){
    	$ad = M("admin");
    	$data["aName"]="zhaoliu";
    	$data["aPwd"]="33333";
    	$ad->add($data);
        //echo $ad->getLastSql();
        //echo $ad->getDbError();
        echo "添加数据到 admin";
    }
    // save
    function up(){
    	$ad = M("admin");   
    	$data["aName"]="我很爱国";
    	$ad->where("aId=1")->save($data);
        echo "修改数据";
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
        //$ad->query($sql);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}