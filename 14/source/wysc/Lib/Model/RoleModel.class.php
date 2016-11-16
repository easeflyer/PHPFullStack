<?php
class RoleModel extends Model {
	protected $_validate = array(
		array('name','require','用户名不能为空')
	);
}
?>