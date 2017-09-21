<?php
/**
 *  参考手册 设计模式
 */

class MySQL{
    function query(){
        echo "执行mysql 的 query 方法";
    }
}

class SQLite{
    function query(){
        echo "执行sqlite 的 query 方法";
    }
}



class Fac{ //工厂类 用来创建对象的。
	// 参数 $cls 是要创建类的名称
	public static function createObj($cls){
		return new $cls();
                // new MySql();
                // new SQLite();
                
	}
}

$u1 = Fac::createObj("SQLite");  //$u1 是user1 的对象。*****
$u2 = Fac::createObj("MySQL");  //$u1 是user1 的对象。*****

echo $u1->query();






















