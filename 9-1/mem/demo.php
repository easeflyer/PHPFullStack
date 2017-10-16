<?php
/**
        $mem->connect("主机名称",11211); 
        $mem->set(变量名称,value,标志位,有效期)  //添加的值 telnet  模式下也能获取到
        $mem->add(变量名称,value,标志位,有效期)
        $mem->get(变量名称);
        $mem->delete("变量名称");

 */



header("content-type:text/html;charset=utf-8");
//php操作memcache
$mem = new Memcache;
//print_r($mem);
$mem->connect("localhost", 11211);

//添加字符串  $mem->set(变量名称,value,标志位,有效期) MEMCACHE_COMPRESSED 0 压缩
$mem->set("key1", "zhangsan", MEMCACHE_COMPRESSED, 3600);
echo "key1:" . $mem->get("key1") . "<br />";

//添加数组:
$arr = array("lisi", "wangwu", "zhaoliu");
$mem->set("key2", $arr, MEMCACHE_COMPRESSED, 3600);
print_r($mem->get("key2"));
echo "<br />";

//对象写入memcache
class mem {

    public $name = "zh";

    function at() {
        echo "我赢职场";
    }

}

$me = new mem(); //对象能否放到memcache, 也可以。
$mem->set("mObj", $me, MEMCACHE_COMPRESSED, 3600);

$mobj = $mem->get("mObj");
echo $mobj->at() . $mobj->name;

