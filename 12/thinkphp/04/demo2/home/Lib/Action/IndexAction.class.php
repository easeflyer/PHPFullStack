<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		//调用数据库的配置项 C  配置项中的内容可以再action中使用了。
                echo C("DB_TYPE");
		//实例化模型
		$users = new Model("user"); //不带前缀的表名
		dump($users->find()); // 确定数据库连接成功
                //dump($users);
    }
}