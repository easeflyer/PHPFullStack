<?php
class ShippingtypeModel extends Model {
	protected $_validate = array(
		array('shipname','require','状态不能为空'),
		array('extramoney','currency','费用不能为空')
    );
}
?>