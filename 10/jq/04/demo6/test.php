<?php
// 模拟数据
$rows1 = array(
    array("id"=>"1","uName"=>"zhangsan1","uPwd"=>"111111","uSex"=>"0","uTel"=>"tel1111","uEmail"=>"a.a"),
    array("id"=>"2","uName"=>"zhangsan2","uPwd"=>"22222","uSex"=>"0","uTel"=>"tel2222","uEmail"=>"a.b"),
    array("id"=>"3","uName"=>"zhangsan3","uPwd"=>"333333","uSex"=>"0","uTel"=>"tel3333","uEmail"=>"b.a"),
    array("id"=>"4","uName"=>"zhangsan4","uPwd"=>"444444","uSex"=>"0","uTel"=>"tel4444","uEmail"=>"b.b"),
    array("id"=>"5","uName"=>"zhangsan5","uPwd"=>"555555","uSex"=>"0","uTel"=>"tel5555","uEmail"=>"c.a"),
    );


/*
$link = mysql_connect("localhost","root","");
mysql_query("set names utf8");
mysql_select_db("test",$link);
$sql = "select * from users";
$result = mysql_query($sql);
while($rs = mysql_fetch_assoc($result)){
	$rows[] = $rs;
}
*/



echo json_encode($rows1);
?>
