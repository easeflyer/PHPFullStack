<?php

/**
 * Description of BooksViewModel
 *
 * @author Administrator
 */
class BooksViewModel extends ViewModel {
    //put your code here
    public $viewFields = array(
        'books'=>array('bName','bAuth','bDate','_type'=>'LEFT'),
        'cat'=>array('cName','_on'=>'books.bSid=cat.cId','_type'=>'LEFT'),
        'pub'=>array('pName','_on'=>'books.pId=pub.pId')
    );
}
