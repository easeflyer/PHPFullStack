<?php
class GoodsModel extends Model {
	protected $_validate = array(
		array('goodsname','require','商品名称不能为空'),
		array('category_id','/^\d+$/','商品分类不正确'),
		array('price','currency','商城价格必须为数字'),
		array('mprice','currency','市场价格必须为数字'),
		array('storenum','/^\d+$/','库存必须为正整数'),
		array('brand_id','/^\d+$/','商标选择不正确',2),
		array('goodattr_id','require','请选择商品所属模型'),
		array('goodattr_id','/^\d+$/','商品模型不正确')	
    );
}