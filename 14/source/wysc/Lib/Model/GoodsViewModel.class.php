<?php
/**
 * 视图模型参见手册 6.23
 */
class GoodsViewModel extends ViewModel {
	protected  $viewFields=array(
		'Goods'=>array('*'),
		'Brand'=>array('brandname','_on'=>'Brand.id=Goods.brand_id'),
		'Category'=>array('catname','_on'=>'Category.id=Goods.category_id'),
		'Goodattr'=>array('attrname','_on'=>'Goodattr.id=Goods.goodattr_id','_type'=>'LEFT'),
		'Goodtype'=>array('typename','_on'=>'Goods.goodtype_id=Goodtype.id')
	);
}
?>