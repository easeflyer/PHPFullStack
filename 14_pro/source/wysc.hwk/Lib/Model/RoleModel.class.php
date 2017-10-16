<?php

class RoleModel extends Model {
    protected $_validate = array(
        array('name','require','角色名称不能为空')
    );
}
?>