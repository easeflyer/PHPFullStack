<?php

class NodeModel extends Model {

    protected $_validate = array(
        array('name', 'require', '英文名称不能为空'),
        array('title', 'require', '菜单名不能为空'),
    );

    function getself($catid) {
        return $this->find($catid);
    }

    /**
     * 获取一级父类的详细信息
     *
     * @param  int $catid  分类的id值
     */
    function getparent($catid) {
        $self = $this->getself($catid);
        if ($self['pid'] == 0)
            return null;
        return $this->getself($self['pid']);
    }

    /**
     * 获取一级子栏目的信息
     * 如果该分类没有子栏目将返回空值
     * @param int $catid  商品分类的id值
     * 
     * 判断的是 is_show 结果 sql 里面用的是 status ???
     * 
     * is_show 是否显示， status 是否禁用
     * @return 所有子节点数据集
     */
    function getchild($catid, $is_show = false, $level = 999) {
        //session('is_show',$is_show."-----------");  经过测试 managenode.html 显示全部节点时 is_show = false
        if ($is_show) { // 如果 “显示”则 只有非禁用（status=0）显示。
            return $this->where("pid='$catid' and status=0 and level<$level")->select();
        } else { // 默认情况下，全都显示。
            return $this->where("pid='$catid' and level<$level")->select();
        }
    }

    /**
     * 判断给定栏目是否有子栏目 catid  其实应该是 nodeid 因为这里已经命名为 节点了，由用 catid 明显命名问题。
     * 也就是 catid 是否有子节点？返回布尔值
     * 
     * @param int $catid  商品分类的id值
     */
    function haschild($catid, $level = 999) {
        return $this->where("pid='$catid' and level<$level")->count() > 0 ? true : false;
    }

    /**
     * 为jquery easyUI获取栏目分类数据，递归算法
     * 这里是 NodeModel 模型，也就是节点模型。节点也就是系统的所有后台管理功能和操作。有栏目，有具体操作：如 编辑，删除
     * 利用递归算法的原因是 节点理论上是 无限等级分类
     *
     * @param int $catid  商品分类的id值   ease:应该是节点 id 值；用 catid 把自己搞糊涂了。
     * @param array &$ret  存储返回结果   传入了一个引用，结果被带回。
     * 
     * 深度优先搜索；  如果 catid 传入 0 则遍历整个树
     * $ret 是根
     * 如果没有 子节点 则退出
     * 
     * 获得所有子节点
     * 循环处理所有子节点
     *      如果有子节点 则 递归处理
     * 
     * 注意：上面递归处理后 把 树$value 加入
     * 
     * 
     */
    function gettreedataforui($catid, &$ret) {
        // 如果 catid 没有子节点，则直接返回。数组为空。
        if (!$this->haschild($catid))
            return false;
        // 返回所有子子节点 数据集，下面开始进行循环遍历
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->gettreedataforui($value[id], $value['children']);  // 注意这里 $value 是作为 $ret 传入的。
            }
            $ret[] = $value;
            //dump($ret);echo "<hr />";
        }
    }

    /**
     *   递归改造 ease  没有多大必要。
     */
    function gettreedataforui1($nodeid, &$ret) {
        $childs = $this->getchild($nodeid);
        if (count($childs) > 0) {
            foreach ($childs as $value) {
                if ($this->haschild($value['id'])) {
                    $this->gettreedataforui($value[id], $value['children']);  // 注意这里 $value 是作为 $ret 传入的。
                }
                $ret[] = $value;
            }
        }
        //dump($ret);echo "<hr />";
    }

    function getjsonforcombotree($catid, &$ret, $level = 999) {
        //echo $level;exit;
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
                $this->getjsonforcombotree($value1[id], $value1['children'], $level);
            }
            $ret[] = $value1;
        }
    }

    function getjsonformenu($catid, &$ret, $level = 999) {
        if (!$this->haschild($catid))
            return false;
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

    /**
     * 用于 管理 角色权限，给角色分配权限时 输出一个 节点树
     * 具备权限的节点应该 显示为对勾。
     * 
     * 算法概要：遍历每个节点，然后根据 access 记录确定这个节点 是否应该 打对勾。
     * 
     * @param type $catid
     * @param type &$ret  传入的引用，用于构造 树型的数组。
     * @param type $roleid  当前角色 id
     * @param type $level
     * @return boolean
     * 
     * 增加了：text 下标 和 checked 下标 对每一个节点。
     * 原因是：easyui-tree 每个节点，有 text,和 checked 属性 因此 combotreejson1 方法 需要提供这两个属性。
     * rbac->combotreejson1 调用的本方法
     * 
     */
    function getjsonforcombotree1($catid, &$ret, $roleid, $level = 999) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);

        foreach ($childs as $value) {
            // access 模型 用来给角色 分配节点
            $accessmodel = M('access');
            $value1 = array();
            //nodeid 菜单或节点的id
            $value1[id] = $value[id];
            $value1[text] = $value[title];
            if ($value[iconCls]) {
                $value1[iconCls] = $value[iconCls];
            }
            //检测节点id在权限表中是否存在：ease 也就是说 遍历的当前节点 是否是 当前角色具备的权限节点。
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
    /**
     *  对以上 递归 方法 进行简化。 参考：gettreedataforui
     */
    function getjsonforcombotree2($catid, &$ret, $roleid, $level = 999) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);

        foreach ($childs as $value) {
            // access 模型 用来给角色 分配节点
            $accessmodel = M('access');
            $value1 = array();
            $value[text] = $value[title];
            //检测节点id在权限表中是否存在：ease 也就是说 遍历的当前节点 是否是 当前角色具备的权限节点。
            $count1 = $accessmodel->where("node_id='$value[id]' and role_id='$roleid' and level=3 ")->count();
            //echo $accessmodel->getlastsql();
            if ($count1 > 0) {
                $value[checked] = true;
            }

            if ($this->haschild($value['id'], $level)) {
                $this->getjsonforcombotree1($value[id], $value['children'], $roleid, $level);
            }
            $ret[] = $value;
        }
    }    
    
    
    
    //调用制定分类的子类，不需要体现包含关系
    function getallchild($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->getallchild($value[id], $ret);
            }
            $ret[] = $value;
        }
    }

    /**
     * 获取制定子类的所有父类
     *
     * @param unknown_type $catid
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