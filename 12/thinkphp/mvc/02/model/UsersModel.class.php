<?php
class  users{  //用来存放 所有users表的属性
	public $uId;
	public $uName;
	public $uPwd;
	public $uAge;
}
class UsersModel{  //类名和文件名称相同 对users表进行增删改查
	public $dbLink; //通用的操作数据库的对象。
	function __construct($db){
		$this->dbLink = $db;
	}
	function addUsers($uObj){ //执行添加用户方法
		$sql = "insert into users(uName,uPwd,uAge) values('{$uObj->uName}','{$uObj->uPwd}','{$uObj->uAge}')";
		//执行 sql 语句； 必须调用model 类的对象
		$this->dbLink->query($sql); //  属性是对象的 写法。
	}
	function delUsers($uObj){ //根据id 删除数据
		$sql = "delete from users where uId={$uObj->uId}";
		$this->dbLink->query($sql);
	}
	function save($uObj){ //修改users表的方法。
		$sql = "update users set uName='{$uObj->uName}',uPwd='{$uObj->uPwd}',uAge='{$uObj->uAge}' where uId={$uObj->uId}";
		$this->dbLink->query($sql);
	}
	//查询记录 1 根据id 查找记录  2 查找所有记录  3 自定义条件查找
	function getUsersById($uObj){		//需要带有id属性
		$sql = "select * from users where uId={$uObj->uId}";
		return $this->dbLink->fetchOne($sql);
	}
	function select(){
		$sql = "select * from users";
		return $this->dbLink-> fetchAll($sql);
	}
	function getUsersByCon($where="",$order=""){ //通过自定义条件查找
		//where order 不一定总是有。
		$where =  $where==""?"":"where {$where}";
		$order =  $order==""?"":"{$order}";
		$sql = "select * from users {$where} {$order}";  //from users where uName like.....
		return $this->dbLink->fetchAll($sql);
	}
	
	
	
	
	
	
}