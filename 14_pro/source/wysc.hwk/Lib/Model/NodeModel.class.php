<?php

class NodeModel extends Model {

    protected $_validate = array(
        array('name', 'require', '英文名称不能为空'),
        array('title', 'require', '菜单名不能为空'),
    );

    /*
     * 获取指定商品分类的详细信息
     * 分类的id值
     */

    function getself($catid) {
        return $this->find($catid);
    }

    /*
     * 获取一级父类的详细信息
     * $catid 分类的id值
     */

    function getparent($catid) {
        $self = $this->getself($catid);
        if ($self["pid"] == 0) {
            return null;
        } else {
            return $ret = $this->getself($self['pid']);
        }
    }

    /**
     * 获取一级子菜单的信息
     * 如果该分类没有子栏目将返回空值
     * 商品分类的id值
     */
    function getchild($catid, $is_show = false, $level = 999) {
        if ($is_show) {
            return $this->where("pid='$catid' and status=0 and level<$level")->select();
        } else {
            //echo $this->getlastsql();
            return $this->where("pid='$catid' and level<$level")->select();
        }
    }

    /**
     * 判断给定栏目是否有子栏目
     * 商品分类的id值
     */
    function haschild($catid, $level = 999) {
        return $this->where("pid='$catid' and level<$level")->count() > 0 ? true : false;
    }

    /**
     * 为jq eui获取栏目分类数据，递归算法
     * 商品分类的id值
     * 存储返回结果
     */
    function gettreedataforui($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->gettreedataforui($value['id'], $value['children']);
            }
            $ret[] = $value;
        }
    }

    function getjsonforcombotree($catid, &$ret, $level = 999) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);

        foreach ($childs as $value) {
            $value1 = array();
            $value1[id] = $value[id];
            $value1[text] = $value[title];
            if ($value[iconCls]) {
                $value1[iconCls] = $value[iconCls];
            }
            if ($this->haschild($value['id'], $level)) {
                $this->getjsonforcombotree($value1['id'], $value1['children'], $level);
            }
            $ret[] = $value1;
        }
        return $ret;
    }

    function getjsonformenu($catid, &$ret, $level = 999) {
        if (!$this->haschild($catid)) return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($value[is_show] == 0)
                continue;
            $value1 = array();
            //nodeid 菜单或节点的id
            $value1[id] = $value[id];
            $value1[text] = $value[title];
            if ($value[iconCls]) {
                $value1[iconCls] = $value[iconCls];
            }
            if ($this->haschild($value['id'], $level)) {
                $this->getjsonformenu($value1[id], $value1['children'], $roleid, $level);
            }
            $ret[] = $value1;
        }
    }

    function getjsonforcombotree1($catid, &$ret, $roleid, $level = 999) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);

        foreach ($childs as $value) {
            $accessmodel = M('access');
            $value1 = array();
            //nodeid 菜单或节点的id
            $value1[id] = $value[id];
            $value1[text] = $value[title];
            if ($value[iconCls]) {
                $value1[iconCls] = $value[iconCls];
            }
            //检测节点id在权限表中是否存在
            $count1 = $accessmodel->where("node_id='$value[id]' and role_id='$roleid' and level=3 ")->count();
            //echo $accessmodel->getlastsql();
            if ($count1 > 0) {
                $value1[checked] = true;
            }

            if ($this->haschild($value['id'], $level)) {
                $this->getjsonforcombotree1($value1[id], $value1['children'], $roleid, $level);
            }
            $ret[] = $value1;
        }
    }

    //调用制定分类的子类，不需要体现层次关系
    function getallchild($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->getallchild($value['id'], $ret);
            }
            $ret[] = $value;
        }
    }

    /**
     * 获取制定子类的所有父类
     * $catid
     */
    function getallparent($catid) {
        $self = $this->getself($catid);
        $pid = $self[pid];
        $ret = array();
        $ret[] = $self;
        while ($pid != 0) {
            $item = $this->getself($pid);
            $ret[] = $item;
            $pid = $item[pid];
        }
        return array_reverse($ret);
    }

}

?>