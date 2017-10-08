<?php

/*
 * 商品分类模型，使用无限分类算法，来实现商品分类表的增删改查
 */

class NewscateModel extends Model {
    
    /*
     * 获取指定商品分类的详细信息
     * 商品分类的id值
     */

    function getself($catid) {
        return $this->find($catid);
    }

    /*
     * 获取一级父类的详细信息
     * 商品分类的id值
     */

    function getparent($catid) {
        $self = $this->getself($catid);
        //print_r($self);
        if ($catid['pid'] == 0)
            return null;
        return $this->getself($self['pid']);
    }

    /*
     * 获取一级子栏目的信息
     * 如果该分类没有子栏目将返回空值
     * 商品分类的id值
     */

    function getchild($catid, $is_show = false) {
        if ($is_show) {
            return $this->where("pid='$catid' and is_show=1 ")->select();
        } else {
            return $this->where("pid='$catid'")->select();
        }
    }

    /*
     * 判断给顶栏是否有子栏目
     * 商品分类的id值
     */

    function haschild($catid) {
        return $this->where("pid='$catid'")->count() > 0 ? true : false;
    }

    /*
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

    function getjsonforcombotree($catid, &$ret) {
        if (!$this->haschild($catid))
            return false;
        $childs = $this->getchild($catid);
        foreach ($childs as $value) {
            //每次清空
            $value1 = array();
            $value1[id] = $value[id];
            $value1[text] = $value[catname];
            if ($this->haschild($value['id'])) {
                $this->getjsonforcombotree($value1[id], $value1['children']);
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

    //获取制定子类的所有父类
    function getallparent($catid) {
        $self = $this->getself($catid);
        $pid = $self[pid];
        //print_r($self);
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