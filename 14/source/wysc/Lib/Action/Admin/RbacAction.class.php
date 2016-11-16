<?php

class RbacAction extends Action {

    function testRbac(){
        import('Org.Util.RBAC');
       // RBAC::authenticate();
        
        // 下面用于测试 getAccessList 的功能
        $acc = RBAC::getAccessList(13);
        print_r($acc);
    }
    function manageadmin() {
        $page = (int) $_GET[page];
        $page = max(1, $page);
        // $model 管理员表
        $model = M('Adminuser');
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        // data 是当前页的管理员列表
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        // $roleusermodel 是吧 所有用户的权限分配数据都显示在一个视图中
        //          id      user_id role_id     username    name
        //          35      3           1              admin         超级管理员
        $roleusermodel = new RoleuserViewModel();  // 实例化这个视图
        $data1 = array();
        // 利用循环构建了 此管理员的所有 角色 用两个空格分隔 见对应功能的显示
        foreach ($data as $value) {
            $userid = $value[id];
            $roledata = $roleusermodel->where("user_id='$userid'")->select();
            $roles = "";
            foreach ($roledata as $value1) {
                $roles.=$value1['name'] . '&nbsp;&nbsp;';
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
            print_r($_POST);
            if (!$usermodel->create()) {
                $message = $usermodel->getError();
                $this->error($message);
                return;
            }
            $usermodel->lastlogin = time();

            $usermodel->pwd = md5($usermodel->pwd);
            $usermodel->startTrans();
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

    /**
     * 
     * @return type
     *  如果取消这个管理员所有角色 编辑失败。
     *   可以考虑 删除管理员同时，删除管理员的角色分配，也就是roleuser 表
     */
    
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
    /**
     *  注意这里没有考虑 roleuser 表，应该在删除管理员的同时 删除 roleuser表的对应数据。设置 ondelete 外键操作
     */
    function admindel() {
        $id = (int) $_GET['id'];
        $usermodel = new AdminuserModel();
        if ($usermodel->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
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

    // 直接 显示 不分页 因为 节点数有限
    function managenode() {
        $this->display();
    }

    /**
     * 节点添加
     * 有提交就处理，没有则显示表单
     * 
     */
    function nodeadd() {
        if ($_POST) {
            $model = new NodeModel();
            $level = $_POST[level];
            $pid = $_POST[pid];
            $p = $model->find($pid);
            if ($level - $p[level] != 1) {
                $this->error('菜单级别选择错误');
                return;
            }
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

    function testHasChild(){
        //echo 1111111;exit;
       $model = new NodeModel();
       $re = $model->haschild(1,0);
       if($re) echo "true";
       else echo "false";
    }
    function combotreejson() {
        $level = (int) $_GET['level'];
        if (!$level)  // 注意此处如果 $level = 0 则 会用 999  替代
            $level = 999;
        $model = new NodeModel();
        $model->getjsonforcombotree(0, &$data, $level);
        echo json_encode($data);
    }
    // access.html 模板 调用的他 url:'{:U('Rbac/combotreejson1',array('roleid'=>$roledata[id]))}',
    //
    function combotreejson1() {
        $level = (int) $_GET['level'];
        $roleid = (int) $_GET[roleid];  // 获得角色 id
        if (!$level)
            $level = 999;
        $model = new NodeModel();
        // 读取数据 
        // 参数1 传入值0 代表 遍历整个 节点树，用于给这个角色分配权限，添加一个“测试角色”点分配权限可知。
        // $data 是要构建的 树形 数组
        // $roledid 当前角色 id
        // $level 是等级？？
        
        $model->getjsonforcombotree1(0, &$data, $roleid, $level);
        echo json_encode($data);
    }

    /**
     *  用于提供 所有节点的 json 数据
     */
    function treegridjson() {
        $model = new NodeModel();
        // 从 0 节点开始 获取整个节点树 的数组形式
        $model->gettreedataforui(0, &$data);  //注意这里 提供数据用 & 高版本的 php报错。应该去掉 &
        //dump($data);
        echo json_encode($data);
    }

    // 只用来对 递归 进行测试，没有其他用途。
    function testTree() {
        //global $data;
        $model = new NodeModel();
        // 从 0 节点开始 获取整个节点树 的数组形式
        $data = array();
        $model->gettreedataforui(0, &$data);
        //print_r($data);
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
                $this->error('编辑失败');
            }
        } else {
            $nodeid = (int) $_GET['id'];

            $data = $model->find($nodeid);

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
            $this->error("删除失败", U('Rbac/managenode'));
        }
    }

    /**
     * 配置权限
     * 只是把 角色名字 模型实例化； 模板中 对 节点进行读取 参见模板 mytree div
     * 把当前角色 数据 传递给 模板 用于 调用当前角色 的 权限节点树。见模板
     */
    function access() {
        $roleid = (int) $_GET[id];
        $model = new RoleModel();
        $roledata = $model->find($roleid);
        $this->assign('roledata', $roledata);
        $this->display();
    }

    /**
     * 修改节点权限
     * ids 是 access.html 模板中 handledata 方法构造的 字符串参数 所有 选中的节点id
     */
    function addaccess1() {
        $ids = $_POST[ids];
        $roleid = $_POST['roleid'];
        $ids = explode(',', $ids);
        // 去掉重复，原因是 子节点 具有相同的父节点，所以父节点可能被重复添加进来
        $ids = array_unique($ids);
        $nodemodel = new NodeModel();
        $data = array();
        $accessmodel = M('access');
        // 清空当前角色 的所有权限。
        $accessmodel->where("role_id='$roleid'")->delete();
        foreach ($ids as $val) {
            // $val 所有 具备权限的节点 id
            // $item 用来保存 access 
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
    /**
     *   由 access.html  通过 ajax 进行调用。 用来保存 配置的权限
     *  注意这里 只要一个 子权限被勾选，则它的父权限也被勾选 保存到 access 表中。
     */
    function addaccess() {
        $ids = $_POST[ids];
        $roleid = $_POST['roleid'];
        $ids = explode(',', $ids);
        // 去掉重复，原因是 子节点 具有相同的父节点，所以父节点可能被重复添加进来
        $ids = array_unique($ids);
        $nodemodel = new NodeModel(); // 实例化它，只是为了取一个 level 
        $accessRows = array();
        $accessmodel = M('access');
        // 清空当前角色 的所有权限。
        $accessmodel->where("role_id='$roleid'")->delete();
        foreach ($ids as $val) {
            // $val 所有 具备权限的节点 id
            // $item 用来保存 access 
            $accessRow = array();
            $nodedata = $nodemodel->find($val);
            $accessRow[level] = $nodedata[level];
            $accessRow[node_id] = $val;
            $accessRow[role_id] = $roleid;
            $accessRows[] = $accessRow;
        }
        if ($accessmodel->addAll($accessRows)) {
            echo "0";
        } else {
            echo "1";
        }
    }    

    /**
     * 获取所有可用图标
     *
     */
    function getallicons() {
        $iconpath = 'skins/plugin/ui/themes/icons/';
        $files = scandir($iconpath);
        $this->assign('files', $files);  // 文件列表。
        $this->assign('path', $iconpath); //图标路径。
        $this->display();
    }

}

?>