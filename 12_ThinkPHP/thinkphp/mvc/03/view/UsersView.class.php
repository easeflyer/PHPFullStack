<?php
class UsersView{
	function listUsers(){
		$tplFile = "view/tpl.html";  //指定模板路径  调用文件时候，是index-->userView-->tpl.html
		$data = file_get_contents($tplFile);// 调用模板
		//页面上数据怎么来，路径怎么会单入口？？？？
		echo $data;		
	}
}