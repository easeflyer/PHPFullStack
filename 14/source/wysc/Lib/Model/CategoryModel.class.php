<?php

/**
 * 商品分类模型，使用无限分类算法，来实现商品分类表的增删改查
 *
 */
class CategoryModel extends Model {

    /**
     * 设定自动验证规则
     */
    protected $_validate = array(
        array('catname', 'require', '栏目名称不能为空'),
        array('dw', 'require', '单位不能为空'),
        // 下面的代码 有 bug \d 代表一个数字
        // array('pid', '/(^\d$|^作为顶级分类$)/', '必须为数字'),
        array('pid', '/(^\d+$|^作为顶级分类$)/', '必须为数字'),
    );

    /**
     * 获取制定商品分类的详细信息  多此一举的函数
     * @param int $catid  商品分类的id值
     */
    function getself($catid) {
        return $this->find($catid);
    }

    /**
     * 获取一级父类的详细信息
     *
     * @param  int $catid  商品分类的id值
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
     */
    function getchild($catid, $is_show = false) {
        if ($is_show) {
            return $this->where("pid='$catid' and is_show=1")->select();
        } else {
            return $this->where("pid='$catid'")->select();
        }
    }

    /**
     * 判断给定栏目是否有子栏目
     *
     * @param int $catid  商品分类的id值
     */
    function haschild($catid) {
        //$re = $this->where("pid='$catid'")->count();
        //echo "re:".$re;exit;
        
        return $this->where("pid='$catid'")->count() > 0 ? true : false;
    }

    /**
     * 为jquery easyUI获取栏目分类数据对象，递归算法 构造一个数组
     *
     * @param int $catid  商品分类的id值
     * @param array $ret  存储返回结果
     */
    function gettreedataforui($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->gettreedataforui($value[id], $value['children']);
            }
            $ret[] = $value;
        }
        
    }
    /**
     * 
     * @param type $catid
     * @param type $ret
     * @return boolean
     * 
     * 注意：text 是树的 分支名字，设置正确，每个分支才会显示。
     */
    function getjsonforcombotree($catid, &$ret) {
        //echo $this->getLastSql();exit;
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);

        foreach ($childs as $value) {
            $value1 = array();
            $value1[id] = $value[id];
            $value1[text] = $value[catname];
            // 以下为错误代码 用于演示
            //$value1[catname] = $value[catname];
            if ($this->haschild($value['id'])) {
                $this->getjsonforcombotree($value1[id], $value1['children']);  //easyui,combotree:children
            }
            $ret[] = $value1;
        }
    }

    //调用制定分类的子类，不需要体现包含关系
    //ease：递归 获得所有 分类id，并不形成树形结构
    function getallchild($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            if ($this->haschild($value['id'])) {
                $this->getallchild($value[id], $ret);  // $ret 这里直接传入 $ret 因此 不生成树，只是遍历所有 子类，形成一个数组
            }
            $ret[] = $value;
        }
    }

    /**
     * 获取制定子类的所有父类 包含自己
     * 也就是 这个子类的家谱直到 pid = 0 为止
     * @param unknown_type $catid
     * @return 所有这些父类 包括  catid 自己的 对象实例数组。
     *   
     *   array_reverse 翻转这个数组
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