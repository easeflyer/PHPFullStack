<?php

/**
 *  Roleuser 角色分配表  user_id,role_id
 *  Adminuser  管理员表
 *  Role 角色表：name 角色名， state 是否禁用  remark 说明
 * 
SELECT r . * , a.username, o.name
FROM roleuser AS r, adminuser AS a, role AS o
WHERE r.user_id = a.id
AND o.id = r.role_id
 * 
 */
class RoleuserViewModel extends ViewModel {
	protected  $viewFields=array(
			'Roleuser'=>array('*'),
			"Adminuser"=>array('username','_on'=>"Roleuser.user_id=Adminuser.id"),
			"Role"=>array('name','_on'=>"Role.id=Roleuser.role_id")
		);
}
?>