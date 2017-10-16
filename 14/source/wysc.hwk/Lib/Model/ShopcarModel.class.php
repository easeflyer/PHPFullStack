<?php

class ShopcarModel extends Model {

    protected $_validate = array(
        array('num', '/\d+/', '数量不符合要求'),
        array('users_id', '/\d+/', '用户信息不正确'),
        array('goods_id', '/\d+/', '商品信息不正确')
    );

}

?>