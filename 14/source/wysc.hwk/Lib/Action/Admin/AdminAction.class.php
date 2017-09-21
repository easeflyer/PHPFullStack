<?php

class AdminAction extends CommonAction {

    function index() {

        $menustr = $this->menu();
        $this->assign('menustr', $menustr);


        $this->display();
    }

    private function menu() {
        import("@.Org.Util.RBAC");
        $retstr = '';
        $list = RBAC::getAccesslist($_SESSION[C('USER_AUTH_KEY')]);
        $ret = array();
        $nodemodel = M('Node');
        foreach ($list['ADMINMENU'] as $key => $mod) {
            $retstr.="<li>";
            $item = array();
            $key = strtolower($key);
            $data = $nodemodel->where("lower(name)='$key'")->find();
            $retstr.="<sapn>$data[title]</sapn>";
            if (is_array($mod)) {
                $retstr.="<ul>";
                foreach ($mod as $subkey => $subvalue) {
                    $data1 = $nodemodel->find($subvalue);
                    if ($data1[is_show] == 0 || $data1[status] == 0)
                        continue;

                    $retstr.="<li data-options=\"iconCls:'$data1[iconCls]]'\"><sapn><a href=\"index.php?g=Admin&m=$key&a=$subkey\" target=\"main\">" . $data1[title] . "</a></sapn></li>";
                }
                $retstr.="</ul>";
            }
            $retstr.="</li>";
        }
        return $retstr;
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

}

?>