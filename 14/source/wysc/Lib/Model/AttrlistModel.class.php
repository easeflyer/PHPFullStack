<?php
class AttrlistModel extends Model {
	protected $_validate = array(
		array('name','require','属性名称不能为空'),
		array('inputname','require','控件名称不能为空'),
		array('inputname','/^\w+$/','控件名称必须是英文字符')
    );
}
?>