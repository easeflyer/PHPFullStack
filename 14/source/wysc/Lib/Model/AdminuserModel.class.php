<?php
class AdminuserModel extends Model {
	protected $_validate = array(
		array('username','require','用户名不能为空'),
		array('username','','用户名必须唯一',0,'unique'),
		array('pwd','/.{8,}/','密码至少8位',2,'regex'),
		array('repwd','pwd','密码与确认密码必须一致',0,'confirm')
	);
}
?>