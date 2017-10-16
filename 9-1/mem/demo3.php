<?php
//取demo2 存入的数据的。
$mem = new Memcache;
$mem->addServer("localhost",11211);
$mem->addServer("localhost",9999);
//取数据？？
echo $mem->get("k1")."<br />";
echo $mem->get("k2")."<br />";
echo $mem->get("k3")."<br />";