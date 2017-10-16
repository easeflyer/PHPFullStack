<?php 
class AttrlistViewModel extends ViewModel{
    protected $viewFields=array(
        'Attrval'=>array('*'),
        'Attrlist'=>array('name','inputtype,optionlist,goodsattr_id,inputname','_on'=>"Attrval.attrlist_id=Attrlist.id")
    );
}
?>