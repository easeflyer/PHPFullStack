<?php
//主要是对数据库进行操作
class DB{
	//数据库访问属性
	public $dbHost 		= "localhost";
	public $dbUser 		= "root";
	public $dbPwd 		= "root";
	public $dbName 	= "pro";
	public $dbCharset = "utf8";
	public $links			= "";
	function __construct($dbHost,$dbUser,$dbPwd,$dhName,$dbCharset){
		 //初始化属性
		 $this->dbHost 			= $dbHost;
		 $this->dbHost 		= $dbUser;
		 $this->dbPwd 			= $dbPwd;
		 $this->dhName 		= $dhName;
		 $this->dbCharset 	= $dbCharset;
		 //连接数据库
		 $this->links = mysql_connect($dbHost,$dbUser,$dbPwd) or die(mysql_error());
		mysql_query("set names ". $this->dbCharset);
		mysql_select_db($this->dhName,$this->links);
	}
	function query($sql){
		return mysql_query($sql); //对于 增 删 改 执行  对于select 返回结果集
	}
	//统计select 查询的记录数
	function numRows($sql){
		$result = $this->query($sql);
		return mysql_num_rows($result);
	}
	//增删改语句受影响的行数的。
	function affectedRows(){
		return mysql_affected_rows();
	}
	//得到1条记录的数组 selecct
	function fetchOne($sql){
		$result = $this->query($sql);
		$rs = mysql_fetch_assoc($result);
		return $rs;
	}
	//返回多条记录组成的2维数组
	function fetchAll($sql){
		$result = $this->query($sql);
		$rows = array();
		while($rs = mysql_fetch_assoc($result)){
			$rows[] = $rs;
		}
		return $rows;
	}
	function __destruct(){
		 $this->dbHost 			= NULL;
		 $this->dbHost 		= NULL;
		 $this->dbPwd 			= NULL;
		 $this->dhName 		= NULL;
		 $this->dbCharset 	= NULL;
		 mysql_close();
	}
}
$db = new DB("localhost","root","root","pro","utf8");










