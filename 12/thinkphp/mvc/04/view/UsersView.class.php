<?php
class UsersView{
	public  $dbLink; //通用类的model
	function __construct($dbLink){
		$this->dbLink = $dbLink;		
	}	
	function listUsers($um){
		$tplFile = "view/tpl.html";  //指定模板路径  调用文件时候，是index-->userView-->tpl.html
		$data = file_get_contents($tplFile);// 调用模板
		//页面上数据怎么来，路径怎么会单入口？？？？
		$rs = $um->select();
		//在该方法中 拼接处一个大字符串
		$str="";
		foreach($rs as $key=>$val){
			$str .= "<tr>";
			$str .= "<td>".$val["uName"]."</td>";
			$str .= "<td>".$val["uPwd"]."</td>";
			$str .= "<td>".$val["uAge"]."</td>";
			$str .= "<td> <a href='index.php?a=del&uId={$val["uId"]}'>删除</a> | <a href='index.php?a=updateView&uId={$val["uId"]}'>修改</a></td>";
			$str .= "</tr>";
		}
		$data = str_replace("<!--str-->", $str, $data);
		echo $data;		
	}
	function addView(){
		$file = "view/addView.html";
		$data = file_get_contents($file);
		echo $data;
	}
        // 应该控制器来做
	function addData($um,$us){
			$um->addUsers($us);
	}
	function updateView($um,$us){ //修改展示旧记录
		$file = "view/updateView.html";
		$data = file_get_contents($file);
		$sql = "select * from users where uId=".$us->uId;
		$rs = $this->dbLink->fetchOne($sql);
		$data = str_replace("<!--uId-->", $rs["uId"],$data);
		$data = str_replace("<!--uName-->", $rs["uName"],$data);
		$data = str_replace("<!--uPwd-->", $rs["uPwd"],$data);
		$data = str_replace("<!--uAge-->", $rs["uAge"],$data);
		echo $data;
	}
        // 应该控制器来干
	function updateShowDo($um,$us){
		$um->save($us);
	}
        // 应该由控制器来干
	function del($um,$us){		
		$um->delUsers($us);
	}
}