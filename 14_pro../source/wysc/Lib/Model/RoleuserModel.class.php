<?php
class RoleuserModel extends Model {
	protected $_validate = array(
		array('user_id','require','用户id不能为空'),
		array('role_id','require','角色id不能为空')
	);
	function getrole($userid){
		$roles=$this->field('role_id')->where("user_id='$userid'")->select();
		$retroles=array();
		foreach ($roles as $value){
				$retroles[]=$value['role_id'];
		}
		return $retroles;
	}
	function getuser($roleid){
		$roles=$this->field('user_id')->where("role_id='$roleid'")->select();
		$retroles=array();
		foreach ($roles as $value){
				$retroles[]=$value['user_id'];
		}
		return $retroles;
	}
}
?>