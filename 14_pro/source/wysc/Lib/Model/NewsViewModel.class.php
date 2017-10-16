<?php
class NewsViewModel extends ViewModel {
		protected  $viewFields=array(
			'News'=>array('*'),
			"Newscate"=>array('catname','_on'=>"News.newscate_id=Newscate.id")
		);
}
?>