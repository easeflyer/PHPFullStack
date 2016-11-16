<?php

class AdminAction extends CommonAction {

    function index() {
        if (!$_SESSION[C('ADMIN_AUTH_KEY')]) {
            $menustr = $this->usermenu();
        } else {
            $menustr = $this->adminmenu();
        }


        $this->assign('menustr', $menustr);
        $this->display();
    }

    private function usermenu() {
        import("@.Org.Util.RBAC");
        $retstr = '';
        $list = RBAC::getAccessList($_SESSION[C('USER_AUTH_KEY')]);
        $ret = array();
        $nodemodel = M('Node');
        foreach ($list['ADMINMENU'] as $key => $mod) {
            $item = array();
            $key = strtolower($key);

            $data = $nodemodel->where("lower(name)='$key'")->find();
            if ($data[is_show] == 0 || $data[status] == 0)
                continue;
            $retstr.="<li data-options=\"state:'closed'\">";

            $retstr.="<span>$data[title]</span>";
            if (is_array($mod)) {
                $retstr.="<ul>";
                foreach ($mod as $subkey => $subvalue) {
                    $data1 = $nodemodel->find($subvalue);
                    if ($data1[is_show] == 0 || $data1[status] == 0)
                        continue;

                    $retstr.="<li data-options=\"iconCls:'$data1[iconCls]'\"><span><a href=\"index.php?g=Admin&m=$key&a=$subkey\" target=\"main\">" . $data1[title] . "</a></span></li>";
                }
                $retstr.="</ul>";
            }
            $retstr.="</li>";
        }
        return $retstr;
    }

    private function adminmenu() {
        $str = "";
        $model = new NodeModel();
        //判断后台菜单有没有子元素
        if (!$model->haschild(1))
            return;
        $items = $model->getchild(1);
        foreach ($items as $item) {
            if ($item[status] == 0 || $item[is_show] == 0)
                continue;
            $str.="<li data-options=\"state:'closed'\">";
            $str.="<span>" . $item['title'] . "</span>";
            //判断模块下有没有子菜单
            if ($model->haschild($item['id'])) {
                $str.="<ul>";
                $subitems = $model->getchild($item['id']);
                foreach ($subitems as $subitem) {
                    if ($subitem[status] == 0 || $subitem[is_show] == 0)
                        continue;
                    $str.="<li data-options=\"iconCls:'$subitem[iconCls]'\">";
                    $str.="<span><a href=\"index.php?g=Admin&m=" . $item[name] . "&a=" . $subitem[name] . "\" target=\"main\">" . $subitem[title] . "</a></span>";
                    $str.="</li>";
                }
                $str.="</ul>";
            }
            $str . "</li>";
        }
        return $str;
    }

}

?>