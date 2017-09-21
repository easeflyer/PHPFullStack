<?php

class RoleuserViewModel extends ViewModel {

    protected $viewFields = array(
        'Roleuser' => array('*'),
        "Adminuser" => array('username', '_on' => "Roleuser.user_id=Adminuser.id"),
        "Role" => array('name', '_on' => "Role.id=Roleuser.role_id")
    );

}

?>