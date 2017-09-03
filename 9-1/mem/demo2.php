<?php
$mem = new Memcache;
//连接memcache 在不同的服务器上面开启 memcache 服务，然后用php添加进来即可。
$mem->addServer("localhost",11211);
$mem->addServer("localhost",9999);
//11211 9999
//存入数据 ？？？
$mem->set("k1","aaaaa",MEMCACHE_COMPRESSED,3600);
$mem->set("k2","bbbbbb",MEMCACHE_COMPRESSED,3600);
$mem->set("k3","ccccccc",MEMCACHE_COMPRESSED,3600);
/*
首先 memcached -p 9999 开启第二个服务器
分别telnet 11211 和 9999 发现 3个变量保存在了不同的服务器上。选择服务器也是通过哈希算法决定的。
telnet k1 k3 -->11211  k2-->9999 memcache自动帮我们分配。
*/

// 读取毫不受影响
echo "k1:".$mem->get("k1")."<br />";
echo "k2:".$mem->get("k2")."<br />";
echo "k3:".$mem->get("k3")."<br />";