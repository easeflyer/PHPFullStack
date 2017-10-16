<?php
class AttrlistViewModel extends ViewModel {
	protected $viewFields=array(
	    'Attval'=>array('*'),
		'Attrlist'=>array('name','inputtype,optionlist,goodattr_id,inputname','_on'=>"Attval.attrlist_id=Attrlist.id")
	);
}
?>