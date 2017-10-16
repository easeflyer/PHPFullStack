<?php

class ShopcarViewModel extends ViewModel {

    protected $viewFields = array(
        'Shopcar' => array('*'),
        'Goods' => array('goodsname', 'thumb', 'mprice' => 'goods_mprice', 'price' => 'goods_price', '_on' => "Shopcar.goods_id=Goods.id")
    );

}

?>