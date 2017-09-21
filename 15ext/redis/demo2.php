<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * list 链表
 * 
 * 
 * 
 */

// lpush 从头部插入，rpush 从尾部插入
function test1() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $re = $redis->set('test', 'aaa');
    $re = $redis->get('test');
    var_dump($re);
    $redis->delete('test');  // 注意这里如果不删除则无法对 test 进行 lpush 操作，因为 test 非链表，而仅仅是一个String 
    var_dump($redis->lpush("test", "222"));   //结果：int(1)  
    var_dump($redis->lpush("test", "333"));   //结果：int(2)  
    var_dump($redis->rpush("test", "111"));   //从尾部插入
    var_dump($redis->lpush("test", "444"));
}

// lpop 从头部提取 rpop 从尾部提取
function test2() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    var_dump($redis->lpop("test"));  //结果：string(3) "222"  
    var_dump($redis->lpop("test"));
    var_dump($redis->lpop("test"));
    var_dump($redis->lpop("test"));
}

// llen 返回的列表的长度。如果列表不存在或为空，该命令返回0。如果该键不是列表，该命令返回FALSE。
function test3() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->delete('test');
    $redis->lpush("test", "111");
    $redis->lpush("test", "222");
    $redis->rpush("test", "333");
    $redis->rpush("test", "444");
    var_dump($redis->llen("test"));  //结果：int(4)  
}

// lget 返回指定键存储在列表中指定的元素。 0第一个元素，1第二个… -1最后一个元素，-2的倒数第二…错误的索引或键不指向列表则返回FALSE。
function test4() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->delete('test');
    $redis->lpush("test", "111");
    $redis->lpush("test", "222");
    $redis->rpush("test", "333");
    $redis->rpush("test", "444");
    var_dump($redis->lget("test", 3));  //结果：string(3) "444"  最末尾  
    var_dump($redis->lget("test", 0));  //结果：string(3) "222"  头部
}

// lset 为列表 指定的索引 赋新的值,若不存在该索引返回false.
function test5() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->delete('test');
    $redis->lpush("test", "111");
    $redis->lpush("test", "222");
    var_dump($redis->lget("test", 1));  //结果：string(3) "111"  
    var_dump($redis->lset("test", 1, "333"));  //结果：bool(true)  
    var_dump($redis->lget("test", 1));  //结果：string(3) "333"  
}

//lgetrange 取出一定范围的值  0第一个元素，1第二个元素… -1最后一个元素，-2的倒数第二…
function test6() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->delete('test');
    $redis->lpush("test", "111");
    $redis->lpush("test", "222");
    $redis->lpush("test", "333");
    $redis->lpush("test", "444");
    print_r($redis->lgetrange("test", 0, -1));  //结果：Array ( [0] => 222 [1] => 111 )  
}
// lremove(key,value,count) 从列表中从头部开始移除count个匹配的值。如果count为零，所有匹配的元素都被删除。如果count是负数，内容从尾部开始删除。
function test7() {
    $redis = new redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->delete('test');
    $redis->lpush('test', 'a');
    $redis->lpush('test', 'b');
    $redis->lpush('test', 'c');
    $redis->lpush('test', 'a');
    print_r($redis->lgetrange('test', 0, -1)); //结果：Array ( [0] => a [1] => c [2] => b [3] => a )  
    var_dump($redis->lremove('test', 'a', 2));   //结果：int(2)   两个a 被移除
    print_r($redis->lgetrange('test', 0, -1)); //结果：Array ( [0] => c [1] => b )  
}

test7();
