<?php
class AddressModel extends Model {
    protected $_validate = array(
        array('contact','require','收货人不能为空'),
        array('address','require','详细地址不能为空'),
        array('tel','/^(\d{3,4}-)?\d{8}$/','联系电话不符合条件',2),
        array('phone','/^\d{11}$/','手机不符合条件'),
        array('users_id','/^\d+$/','用户参数不正确')
    );
}
?>