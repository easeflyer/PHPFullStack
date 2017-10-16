<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB.class.php';
require_once './Page.class.php';

$p = $_GET['page'];
$db = new DB("localhost", "root", "", "utf8", "test");
$sql = "select * from users";
$count = $db->num($sql);   // 得到总记录数

//echo $count;exit;

// 注意 page 类里面 对 $_GET 进行了修改。因此如果要使用 $_GET 要提前取出。
$page = new Page($count,2);

$start = ($p-1)*2;
$sql = "select * from users limit ".$start.",2 ";
echo "$sql";

// 显示数据
$rs = $db->fetchAll($sql);

echo "<table border=1>";
foreach($rs as $row){
    echo "<tr><td>{$row['id']}</td><td>{$row['uName']}</td><td>{$row['uSex']}</td><td>{$row['uTel']}</td><td>{$row['uEmail']}</td></tr>";
}
echo "</table>";

// 显示分页 链接
echo $page->show();
