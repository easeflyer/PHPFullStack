<?php
header("content-type:text/html;charset=utf-8");
class DB{
	public $dbHost;
	public $userName;
	public $userPwd;
	public $char;
	public $dbName;
	function __construct($host,$un,$up,$c,$dbn){
		 $this->dbHost 		= $host;
		 $this->userName = $un;
		 $this->userPwd 	= $up;
		 $this->char 			= $c;
		 $this->dbName 	= $dbn;
		$link = mysql_connect($this->dbHost,$this->userName, $this->userPwd);
		mysql_query("set names ".$this->char);
		mysql_select_db($dbn,$link);
	}
	function query($sql){  
		return mysql_query($sql);  
	}
	function  num($sql){  
		$result = $this->query($sql);
		 return mysql_num_rows($result);
	}
	function affected(){
		return mysql_affected_rows();
	}
	function fetchOne($sql){
		$result = $this->query($sql);
		$rs = mysql_fetch_assoc($result);
		return $rs;
	} 
	function fetchAll($sql){
		$result = $this->query($sql);
		$rows = array();
		while($rs = mysql_fetch_assoc($result)){
			$rows[] = $rs;
		}
		return $rows;
	}
	function __destruct(){
		 $this->dbHost 		= NULL;
		 $this->userName = NULL;
		 $this->userPwd 	= NULL;
		 $this->char 			= NULL;
		 $this->dbName 	= NULL;
	}
}
$db = new DB("localhost","root","root","utf8","news");