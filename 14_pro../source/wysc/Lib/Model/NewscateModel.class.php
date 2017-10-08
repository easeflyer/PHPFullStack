<?php
/**
 * 商品分类模型，使用无限分类算法，来实现商品分类表的增删改查
 *
 */
class NewscateModel extends Model {
	/**
	 * 获取制定商品分类的详细信息
	 * @param int $catid  商品分类的id值
	 */
	function getself($catid){
		return $this->find($catid);
	}	
	/**
	 * 获取一级父类的详细信息
	 *
	 * @param  int $catid  商品分类的id值
	 */
	function getparent($catid){
		$self=$this->getself($catid);
		if($self['pid']==0) return null;
		return $this->getself($self['pid']);	
	}
	/**
	 * 获取一级子栏目的信息
	 * 如果该分类没有子栏目将返回空值
	 * @param int $catid  商品分类的id值
	 */
	function getchild($catid,$is_show=false){
		if($is_show){
		return $this->where("pid='$catid' and is_show=1")->select();
		}else{
		return $this->where("pid='$catid'")->select();
		}
	}
	/**
	 * 判断给定栏目是否有子栏目
	 *
	 * @param int $catid  商品分类的id值
	 */
	function haschild($catid){
		return $this->where("pid='$catid'")->count()>0?true:false;
	}
	/**
	 * 为jquery easyUI获取栏目分类数据，递归算法
	 * 和产品分类算法一样 参见产品分类算法
	 * @param int $catid  商品分类的id值
	 * @param array $ret  存储返回结果
	 */
	function gettreedataforui($catid,&$ret){
		if(!$this->haschild($catid))return false;
		$childs=$this->getchild($catid);
		foreach ($childs as $value){
			if($this->haschild($value['id'])){
				$this->gettreedataforui($value[id],$value['children']);
			}
			$ret[]=$value;
		}
	}
        /**
         * 采用递归方式 生成新闻分类树
         * 分类算法参考 产品分类
         * @param type $catid
         * @param type $ret
         * @return boolean
         */
	function getjsonforcombotree($catid,&$ret){
		if(!$this->haschild($catid))return false;
		$childs=$this->getchild($catid);
		
		foreach ($childs as $value){
			$value1=array();
			$value1[id]=$value[id];
			$value1[text]=$value[catname];
			if($this->haschild($value['id'])){
				$this->getjsonforcombotree($value1[id],$value1['children']);
			}
			$ret[]=$value1;
		}
	}
	//调用制定分类的子类，不需要体现包含关系
	function getallchild($catid,&$ret){
		if(!$this->haschild($catid))return false;
		$childs=$this->getchild($catid);
		foreach ($childs as $value){
			if($this->haschild($value['id'])){
				$this->getallchild($value[id],$ret);
			}
			$ret[]=$value;
		}
	}
	/**
	 * 获取制定子类的所有父类
	 *
	 * @param unknown_type $catid
	 */
	function getallparent($catid){
		$self=$this->getself($catid);
		$pid=$self[pid];
		$ret=array();
		$ret[]=$self;
		while($pid!=0){
			$item=$this->getself($pid);
			$ret[]=$item;
			$pid=$item[pid];
		}
		return array_reverse($ret);
	}
}
?>