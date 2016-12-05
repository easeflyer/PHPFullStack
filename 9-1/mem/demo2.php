<?php
$mem = new Memcache;
//连接memcache
$mem->addServer("localhost",11211);
$mem->addServer("localhost",9999);
//11211 9999
//存入数据 ？？？
$mem->set("k1","aaaaa",MEMCACHE_COMPRESSED,3600);
$mem->set("k2","bbbbbb",MEMCACHE_COMPRESSED,3600);
$mem->set("k3","ccccccc",MEMCACHE_COMPRESSED,3600);
//telnet k1 k3 -->11211  k2-->9999 memcache自动帮我们分配。