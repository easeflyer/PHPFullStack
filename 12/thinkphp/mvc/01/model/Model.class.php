<?php
/**
 * 数据库访问工具类
 */
header("content-type:text/html;charset=utf-8");
class Model{
	//属性
	public $dbHost;
	public $userName;
	public $userPwd;
	public $char;
	public $dbName;
	//方法
	function __construct($host,$un,$up,$c,$dbn){ //构造方法，会在实例化的时候调用
		 $this->dbHost 		= $host;
		 $this->userName = $un;
		 $this->userPwd 	= $up;
		 $this->char 			= $c;
		 $this->dbName 	= $dbn;
		$link = mysql_connect($this->dbHost,$this->userName, $this->userPwd);
		mysql_query("set names ".$this->char);
		mysql_select_db($dbn,$link);
	}
	function query($sql){  //对于增 删 该  执行， 对于select 返回结果集
		return mysql_query($sql);  
	}
	function  num($sql){   //返回select 执行记录数
		$result = $this->query($sql);
		 return mysql_num_rows($result);
	}
	function affected(){ //返回 insert delete update 的受影响的行数 
		return mysql_affected_rows();
	}
	function fetchOne($sql){  //得到1条记录
		$result = $this->query($sql);
		$rs = mysql_fetch_assoc($result);
		return $rs;
	} 
	function fetchAll($sql){ //得到所有记录
		$result = $this->query($sql);
		$rows = array();
		while($rs = mysql_fetch_assoc($result)){
			$rows[] = $rs;
		}
		return $rows;
	}
	function __destruct(){ // 垃圾回收的。
		 $this->dbHost 		= NULL;
		 $this->userName = NULL;
		 $this->userPwd 	= NULL;
		 $this->char 			= NULL;
		 $this->dbName 	= NULL;
	}
}
