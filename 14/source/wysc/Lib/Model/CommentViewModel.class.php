<?php
class CommentViewModel extends ViewModel {
	protected $viewFields=array(
	    'Comment'=>array('*'),
		'Users'=>array('username','_on'=>"Users.id=Comment.users_id"),
		'Goods'=>array('goodsname','thumb','_on'=>"Goods.id=Comment.goods_id")
	);
}
?>