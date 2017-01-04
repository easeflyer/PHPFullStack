<?php

header("content-type:text/html;charset=utf-8");

class DB {

    //数据库有什么属性
    public $dbHost;
    public $userName;
    public $userPwd;
    public $char;
    public $dbName;

    function __construct($host, $un, $up, $c, $dbn) {
        //为数据库相关属性赋值。
        $this->dbHost = $host;
        $this->userName = $un;
        $this->userPwd = $up;
        $this->char = $c;
        $this->dbName = $dbn;
        //实例化的时候执行连接数据库动作
        $link = mysql_connect($this->dbHost, $this->userName, $this->userPwd);
        mysql_query("set names " . $this->char);
        mysql_select_db($dbn, $link);
    }

    //执行sql语句的方法;
    function query($sql) {  //对于增 删 改  执行    select 返回资源;
        return mysql_query($sql);
    }

    //统计记录数  mysql_num_rows
    function num($sql) {   //$sql 语句 select
        $result = $this->query($sql);
        return mysql_num_rows($result);
    }

    // mysql_affected_rows(); //insert delete update 受影响的行数。
    function affected() {
        return mysql_affected_rows();
    }

    // select 得到1条记录的方法,返回数组
    function fetchOne($sql) {
        $result = $this->query($sql);
        $rs = mysql_fetch_assoc($result);
        return $rs;
    }

    //select 得到多条记录，返回二维数组。
    function fetchAll($sql) {
        $result = $this->query($sql);
        $rows = array();
        while ($rs = mysql_fetch_assoc($result)) {
            $rows[] = $rs;
        }
        return $rows; //返回二维数组
    }

    function __destruct() {
        $this->dbHost = NULL;
        $this->userName = NULL;
        $this->userPwd = NULL;
        $this->char = NULL;
        $this->dbName = NULL;
    }

}

$db = new DB("localhost", "root", "root", "utf8", "news");
//$sql = "insert into article(aTitle,aDate) values('aaaaa','2014-01-01')";
//$sql = "update article set aTitle='wwww' where aId=2";
//$db->query($sql);
//$db->affected(); //受影响的行数
//$sql = "select * from article";
//$result =$db->query($sql);
//$sql = "select * from article";
//echo $db->num($sql);
//$sql = "select * from article where aId=3";
//$rs = $db->fetchOne($sql);
//var_dump($rs);
$sql = "select * from article";
$arr = $db->fetchAll($sql);
echo "<br />************************<br />";
print_r($arr);
echo "<br />************************<br />";







