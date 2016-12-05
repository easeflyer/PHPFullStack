<?php
//mysql.fun.php
//连接数据库函数
function conn($dbHost,$user,$pwd,$dbName){
	$link = mysql_connect($dbHost,$user,$pwd);
	mysql_select_db($dbName,$link);
	mysql_query("set names utf8");
}
function query($sql){  //mysql_query();  insert delete update select
	return mysql_query($sql); //  增删改 只是执行  对于select 返回结果集
}
function numRows($sql){  //记录总数  select
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	return $count;
}
// 得到1条记录的 一维数组
function  fetchOne($sql){
	$result = mysql_query($sql);
	return mysql_fetch_assoc($result);
}
//得到所有记录的二维数组
function fetch($sql){
	$result = mysql_query($sql);
	$rows = array();
	while($rs = mysql_fetch_assoc($result)){
	  	$rows[] = $rs;
	}
	return $rows;
}
//关闭数据库连接
function close(){
	mysql_close();
}






