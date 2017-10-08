<?php

class RbacAction extends Action {

    function manageadmin() {
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = M('Adminuser');
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $roleusermodel = new RoleuserViewModel();
        $data1 = array();
        foreach ($data as $value) {
            $userid = $value[id];
            $roledata = $roleusermodel->where("user_id='$userid'")->select();
            $roles = "";
            foreach ($roledata as $value1) {
                $roles.=$value1['name'] . '&nbsp;';
            }
            $value['role'] = $roles;
            $data1[] = $value;
        }
        $this->assign('data', $data1);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    function adminadd() {
        if ($_POST) {
            $usermodel = new AdminuserModel();
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                $this->error($message);
                return;
            }
            $usermodel->lastlogin = time();
            $usermodel->pwd = md5($usermodel->pwd);
            $usermodel->startTrans(); //事务级联操作
            if (!$usermodel->add()) {
                $this->error('添加失败');
            }
            $newadminid = $usermodel->getLastInsID();
            $roleusermodel = M('Roleuser');
            $insertdata = array();
            foreach ($_POST['role_id'] as $roleid) {
                $roleuserdata = array();
                $roleuserdata[user_id] = $newadminid;
                $roleuserdata[role_id] = $roleid;
                $insertdata[] = $roleuserdata;
            }
            if ($roleusermodel->addAll($insertdata)) {
                $usermodel->commit();
                $this->success('添加成功');
            } else {
                $usermodel->rollback();
                $this->error('添加失败');
            }
        } else {
            $rolemodel = M('Role');
            $roledata = $rolemodel->select();
            $this->assign('roledata', $roledata);
            $this->display();
        }
    }

    function adminedit() {
        $model = new AdminuserModel();
        if ($_POST) {
            if ($_POST[pwd] == '') {
                unset($_POST[pwd]);
            }
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
                return;
            }
            if ($model->pwd) {
                $model->pwd = md5($model->pwd);
            }
            $model->startTrans();
            $model->save();
            if ($model->geterror != '') {
                $model->rollback();
                $this->error('编辑失败,无数据需要修改');
            }
            $id = $_POST[id];
            $roleusermodel = M('Roleuser');
            $roleusermodel->where("user_id='$id'")->delete();
            $insertdata = array();
            foreach ($_POST['role_id'] as $roleid) {
                $roleuserdata = array();
                $roleuserdata[user_id] = $id;
                $roleuserdata[role_id] = $roleid;
                $insertdata[] = $roleuserdata;
            }
            if ($roleusermodel->addAll($insertdata)) {
                $model->commit();
                //echo $roleusermodel->getlastsql();
                $this->success('编辑成功');
            } else {
                $model->rollback();
                $this->error('编辑失败');
            }
        } else {
            $id = (int) $_GET['id'];
            $data = $model->find($id);
            $this->assign('data', $data);
            $rolemodel = M('Role');
            $roledata = $rolemodel->select();
            $roleuser = new RoleuserModel();
            $roles = $roleuser->getrole($id);
            $roledata1 = array();
            foreach ($roledata as $value) {
                if (in_array($value[id], $roles)) {
                    $value['ischeck'] = 1;
                }
                $roledata1[] = $value;
            }
            $this->assign('roledata', $roledata1);
            $this->display();
        }
    }

    function admindel() {
        $id = (int) $_GET['id'];
        $usermodel = new AdminuserModel();
        if ($usermodel->delete($id)) {
            $this->success('删除成功');
        } else {
            echo $usermodel->getlastsql();
            //$this->error('删除失败');
        }
    }

    function managerole() {
        $model = M('Role');
        $data = $model->select();
        $this->assign('data', $data);
        $this->display();
    }

    function roleadd() {
        if ($_POST) {
            $model = new RoleModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
                return;
            }
            if ($model->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    function roleedit() {
        $model = new RoleModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
                return;
            }

            if ($model->save()) {
                $this->success('编辑成功');
            } else {
                $this->error('编辑失败');
            }
        } else {
            $id = (int) $_GET['id'];
            $data = $model->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function roledel() {
        $id = (int) $_GET['id'];
        $model = new RoleModel();
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    function manageroleuser() {
        $roleid = (int) $_GET[id];
        $model = new RoleuserModel();
        $userids = $model->getuser($roleid);
        $usermodel = new AdminuserModel();
        $userdata = $usermodel->select();
        /*$userdata1=array();
        foreach ($userdata as $value) {
                if (in_array($value[id], $userids)) {
                    $value['isin'] = 1;
                }
                $userdata1[] = $value;
            }
            print_r($userdata1);*/
        $this->assign('roleid', $roleid);
        $this->assign('ids', $userids);
        $this->assign('data', $userdata);
        $this->display();
    }

    function editroleuser() {
        $roleid = (int) $_GET[roleid];
        $ids = $_GET[ids];
        $model = M('Roleuser');
        $model->startTrans();
        if (!$model->where("role_id=$roleid")->delete()) {
            $model->rollback();
        }
        $ids = explode(',', $ids);
        $inserdata = array();
        foreach ($ids as $value) {
            if ($value == 0)
                continue;
            $item = array();
            $item[role_id] = $roleid;
            $item[user_id] = $value;
            $inserdata[] = $item;
        }
        if ($model->addAll($inserdata)) {
            $model->commit();
            $this->success('组成员编辑成功');
        } else {
            $model->rollback();
            $this->error('组成员编辑失败');
        }
    }

    function managenode() {
        $this->display();
    }

    function nodeadd() {
        if ($_POST) {
            $model = new NodeModel();
            $level = $_POST[level];
            $pid = $_POST[pid];
            $p = $model->find($pid);
            if ($level - $p[level] != 1) {
                //echo $model->getlastsql();
                $this->error('菜单级别选择错误');
                return;
            }
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
                return;
            }
            if ($model->add()) {
                //echo $model->getlastsql();
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    function combotreejson() {
        $level = (int) $_GET['level'];
        if (!$level) $level = 999;
        $model = new NodeModel();
        $model->getjsonforcombotree(0, &$data, $level);
        echo json_encode($data);
    }

    function combotreejson1() {
        $level = (int) $_GET['level'];
        $roleid = (int) $_GET[roleid];
        if (!$level) $level = 999;
        $model = new NodeModel();
        $model->getjsonforcombotree1(0, &$data, $roleid, $level);
        echo json_encode($data);
    }

    function treegridjson() {
        $model = new NodeModel();
        $model->gettreedataforui(0, &$data);
        echo json_encode($data);
    }

    function editnode() {
        $model = new NodeModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
                return;
            }
            if ($model->save()) {
                $this->success('编辑成功');
            } else {
                //echo $model->getlastsql();
                $this->error('编辑失败');
            }
        } else {
            $nodeid = (int) $_GET['id'];
            $data = $model->find($nodeid);
            //print_r($data);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function delnode() {
        $nodeid = (int) $_GET['id'];
        if ($nodeid == 0)
            return false;
        $model = new NodeModel();
        if ($model->haschild($nodeid)) {
            $this->error("该菜单当中包含子菜单");
            return false;
        }
        if ($model->delete($nodeid)) {
            $this->success("删除成功", U('Rbac/managenode'));
        } else {
            echo $model->getlastsql();
            $this->error("删除失败");
        }
    }

    //配置权限

    function access() {
        $roleid = (int) $_GET[id];
        $model = new RoleModel();
        $roledata = $model->find($roleid);
        $this->assign('roledata', $roledata);
        $this->display();
    }

    //修改节点权限

    function addaccess() {
        $ids = $_POST[ids];
        $roleid = $_POST['roleid'];
        $ids = explode(',', $ids);
        $ids = array_unique($ids);
        $nodemodel = new NodeModel();
        $data = array();
        $accessmodel = M('access');
        $accessmodel->where("role_id='$roleid'")->delete();
        foreach ($ids as $val) {
            $item = array();
            $nodedata = $nodemodel->find($val);
            $item[level] = $nodedata[level];
            $item[node_id] = $val;
            $item[role_id] = $roleid;
            $data[] = $item;
        }
        if ($accessmodel->addAll($data)) {
            echo "0";
        } else {
            echo "1";
        }
    }

    //获取所有图标

    function getallicons() {
        $iconpath = 'skins/plugin/ui/themes/icons/';
        $files = scandir($iconpath);
        $this->assign('files', $files);
        $this->assign('path', $iconpath);
        $this->display();
    }

}

?>