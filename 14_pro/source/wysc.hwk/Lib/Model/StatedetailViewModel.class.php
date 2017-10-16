<?php

class StatedetailViewModel extends ViewModel {

    protected $viewFields = array(
        'Orderchangedetail' => array('*'),
        'Orderstate' => array('state' => 'fstate', '_on' =>
            'Orderchangedetail.fromstate=mystate1.id', '_as' => 'mystate1'
        )
    );

}

?>