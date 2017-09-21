<?php

/*
 * 首先根据笔记 配置好 php5.5 版本和 redis php扩展，phpstudy 可能需要安装 vc11 环境
 * 
 * 注意目录下的 redis 扩展 和 igbinary 扩展这两个扩展需要在 php.ini 中打开
 * php_igbinary-1.2.0-5.5-nts-vc11-x86     支持 php5.5
 * php_redis-2.2.7-5.5-ts-vc11-x86         经测试也支持 php5.5
 * 
 * 
 * demo1.php   String 数据类型
 * 
 */

// 连接 redis 服务器
function test1() {

    $redis = new redis();
    $result = $redis->connect('127.0.0.1', 6379);
    var_dump($result); //结果：bool(true)  
}

// set 设置 String 类型 key-value
function test2() {

    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $result = $redis->set('test', "11111111111");
    $redis->set('test1', '22222');
    var_dump($result);    //结果：bool(true)  
}

// get 获得 String 类型值
function test3() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $result = $redis->get('test');
    $result = $redis->get('test1');
    var_dump($result);   //结果：string(11) "11111111111"  
}

// delete 删除一个 key
function test4() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->set('test', "1111111111111");
    echo $redis->get('test');   //结果：1111111111111  
    $redis->delete('test');
    var_dump($redis->get('test'));  //结果：bool(false)  
}

// setnx  如果不存在 才 设置。
function test5() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->set('test', "1111111111111");  // test 设置了
    $redis->setnx('test', "22222222");  // 因此这里已经存在，不会覆盖
    echo $redis->get('test');  //结果：1111111111111  
    $redis->delete('test');   // test 被删除
    $redis->setnx('test', "22222222");  // test 不存在，因此被设置为 22222
    echo $redis->get('test');  //结果：22222222  
}

// exists 判断某个键是否存在
function test6() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->set('test', "1111111111111");
    var_dump($redis->exists('test'));  //结果：bool(true)  
}
// getMultiple 同时获得多个键的值
function test7() {

    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->set('test1', "1");
    $redis->set('test2', "2");
    $result = $redis->getMultiple(array('test1', 'test2'));
    //$result = $redis->getMultiple(array('test1', 'test5')); // 如果某一个键不存在则结果返回false 页面中不显示 
    print_r($result);   //结果：Array ( [0] => 1 [1] => 2 )  
}

test7();

//echo phpinfo();
?>  
