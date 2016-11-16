<?php

class UserrankModel extends Model {

    /**
     * 设定自动验证规则
     */
    protected $_validate = array(
        array('rankname', 'require', '级别名称不能为空'),
        array('minpoint', '/^\d+$/', '最小积分必须为数字'),
        array('maxpoint', '/^\d+$/', '最大积分必须为数字'),
        array('discount', '/^\d+$/', '折扣必须为数字'),
        array('discount', array(1, 100), '折扣必须在1与100之间', 0, 'between')
    );

}

?>