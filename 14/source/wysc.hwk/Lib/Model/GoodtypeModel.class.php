<?php
class GoodtypeModel extends Model{
    /**
     * 设定自动验证规则
     */
    protected $_validate = array(
        array('typename','require','类型名称不能为空'),

    );
}
?>