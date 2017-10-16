<?php
class OrderViewModel extends ViewModel {
	protected $viewFields=array(
	    'orders'=>array('*'),
                // ease:修改 增加 '_type'=>'LEFT') 如果不添加则因为 shippingtype_id 没有默认值造成订单不显示
		'orderstate'=>array('state','_on'=>"Orders.orderstate_id=Orderstate.id",'_type'=>'LEFT'), 
		'shippingtype'=>array('shipname','shipdesc','extramoney','_on'=>"Orders.shippingtype_id=Shippingtype.id"), //物流方式
		'users'=>array('username','_on'=>"Users.id=Orders.users_id") //用户信息
	);
}
?>