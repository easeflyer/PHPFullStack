<?php

/**
 *  通过“封装” mysql 相关功能，隐藏了无关的实现细节。使得本页代码更加简洁。
 * 
 *  程序员可以更加专注于 本页功能的编写，而忽略 mysql.class.php 的实现细节。就如同集成电路的 引脚。
 *  装配人员只需要关注 集成电路引脚的 参数即可。无需关注实现细节。
 * 
 *  因此可以说 封装是 复杂的程序代码、应用软件 构建的核心技术条件。
 */

require_once './MySQL.class.php';

$sql = "select * from users";
//$db = new MySQL();

$re = MySQL::getAll($sql);


print_r($re);