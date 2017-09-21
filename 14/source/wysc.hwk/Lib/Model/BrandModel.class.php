<?php
class BrandModel extends Model {
    /*
     * //设定自动验证规则
     */
    protected $_validate=array(
        array('brandname','require','商标名称不能为空'),
    );
}

?>