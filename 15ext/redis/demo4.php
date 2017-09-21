<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 本案例演示了 hash 数据类型用来保存用户数据的两种保存方式。
 * 
 * test1,test2 采用json 序列化保存，可以理解为：横向保存
 * test3,test4 每个字段分别保存到 field-value 可以理解为：纵向保存
 * 应用中可以根据需要进行选择。 横向保存效率更高，适合简单的信息输出。纵向保存可操作性更强，适合并发存取 
 * 
 */

/**
 * test1 test2 把用户表 user_main 保存为一个 hash 的方式。 一个 user_name field 对应一个 json 后的 value
 */


function test1() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

// 准备数据
    $data = array(
        array('user_id' => 3, 'user_name' => 'jack', 'user_pass' => '123', 'user_sex' => '男'),
        array('user_id' => 4, 'user_name' => 'zhangsan', 'user_pass' => '456', 'user_sex' => '女'),
        array('user_id' => 5, 'user_name' => 'lisi', 'user_pass' => '789', 'user_sex' => '男'),
    );
// 假设以上数据是从数据库(mysql)获取的

    foreach ($data as $user) {
        $redis->hset("user_main", $user["user_name"], json_encode($user));
    }
    echo 'success!';
}



function test2(){
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $re = $redis->hgetall("user_main");

        print_r($re);

    echo 'success';
    
    
}

/**
 * test3,test4 演示了 每个用户保存为一个 hash 的存储方式和读取方式
 * test3 保存； test4 读取
 */

// 每个用户一个hash 表的保存方式，user:1  => {user_id:3,user_name:jack.....}
function test3() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

// 准备数据
    $data = array(
        array('user_id' => 3, 'user_name' => 'jack', 'user_pass' => '123', 'user_sex' => '男'),
        array('user_id' => 4, 'user_name' => 'zhangsan', 'user_pass' => '456', 'user_sex' => '女'),
        array('user_id' => 5, 'user_name' => 'lisi', 'user_pass' => '789', 'user_sex' => '男'),
    );
// 假设以上数据是从数据库(mysql)获取的

    foreach ($data as $user) {
        foreach($user as $k=>$v){
            $redis->hset("user:".$user['user_id'],$k,$v );
        }
    }
    echo 'success!';
}


// 每个用户一个 hash 的读取方式。
function test4(){
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    for($i=3;$i<6;$i++){
        print_r( $redis->hgetall("user:".$i) );
    }
    
    echo 'success';
    
    
}




test4();