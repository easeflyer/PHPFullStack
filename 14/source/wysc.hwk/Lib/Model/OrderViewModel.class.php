<?php

class OrderViewModel extends ViewModel {

    protected $viewFields = array(
        'Orders' => array('*'),
        'Orderstate' => array('state', '_on' => "Orders.orderstate_id=Orderstate.id"),
        'Shippingtype' => array('shipname', 'shipdesc', 'extramoney', '_on' => "Orders.shippingtype_id=Shippingtype.id"),
        'Users' => array('username', '_on' => "Users.id=Orders.users_id")
    );

}

?>