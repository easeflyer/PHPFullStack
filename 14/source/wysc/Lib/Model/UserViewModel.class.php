<?php
class UserViewModel extends  ViewModel {
	protected $viewFields=array(
	    'Users'=>array('*'),
		'Userrank'=>array('rankname','discount','_on'=>"Users.userrank_id=Userrank.id")
	);
}
?>