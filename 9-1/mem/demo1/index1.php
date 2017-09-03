<?php  
$mem = new Memcache;  
$mem->connect("127.0.0.1", 11211);  
// var_dump 显示变量的数据类型和值
//var_dump($mem->get('rme64qadeu09fo2bkij09cd5i7'));    // 这里的 key 是 session_id，并且可以看到 数据是序列化后的
$se = $mem->get('rme64qadeu09fo2bkij09cd5i7');
print_r($se);
?>  