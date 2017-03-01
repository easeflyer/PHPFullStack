<?php
//php操作memcache
$mem = new Memcache;
//print_r($mem);
 $mem->connect("localhost",11211);
 //添加字符串
 $mem->set("key1","zhangsan",MEMCACHE_COMPRESSED,3600);
 echo $mem->get("key1") ."<br />";
 //添加数组:
 $arr = array("lisi","wangwu","zhaoliu");
 $mem->set("key2",$arr,MEMCACHE_COMPRESSED,3600);
 print_r($mem->get("key2"));
 echo "<br />";
 //对象写入memcache
 class mem{
 	public $name = "zh";
 	function at(){
 		echo "我赢职场";
 	}
 }
 $me = new mem(); //??对象能否放到memcache
 $mem->set("mObj",$me,MEMCACHE_COMPRESSED,3600);
 
 
 
 
 