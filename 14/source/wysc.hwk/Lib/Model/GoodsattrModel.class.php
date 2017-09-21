<?php
class GoodsattrModel extends Model {
    /*
     * //设定自动验证规则
     */
    protected $_validate=array(
        array('attrname','require','商标属性名称不能为空'),
    );
}











?>