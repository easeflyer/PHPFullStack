<?php
class GoodsViewModel extends ViewModel{
    protected $viewFields=array(
        'Goods'=>array('*'),
        'Brand'=>array('brandname','_on'=>'Brand.id=Goods.brand_id'),
        'Category'=>array('catename','_on'=>'Category.id=Goods.category_id'),
        'Goodsattr'=>array('attrname','_on'=>'Goodsattr.id=Goods.goodsattr_id','_type'=>'LEFT'),
        'Goodtype'=>array('typename','_on'=>'Goods.goodtype_id=Goodtype.id')
    );
}
?>