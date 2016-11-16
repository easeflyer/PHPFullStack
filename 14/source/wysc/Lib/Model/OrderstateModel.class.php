<?php
class OrderstateModel extends Model {
	protected $_validate = array(
		array('state','require','状态不能为空')
    );
}
?>