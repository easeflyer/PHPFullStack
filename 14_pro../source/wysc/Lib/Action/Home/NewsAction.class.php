<?php
class NewsAction extends Action {
	function show(){	
		$newsid=(int)$this->_get('newsid');
		$newsmodel=new NewsViewModel();
		$data=$newsmodel->find($newsid);
		if($data[isjump]==1){
			if($data[jumpurl]!=''){
				header("location:$data[jumpurl]");
			}else{
				R("Home/Common/error",array("广告链接地址为空"));
    	    return; 
			}
		}
		R('Home/Common/header');
		R('Home/Index/getleft',array('topid'=>0));
	
		$this->assign('data',$data);
		$this->display();
	}
	function lists(){
		import("ORG.Util.Page");
		R('Home/Common/header');
		R('Home/Index/getleft',array('topid'=>0));
		$catid=(int)$this->_get('catid');
		$page=(int)$_GET[page];
		$catemodel=new NewscateModel();
		$catedata=$catemodel->find($catid);
		$newsmodel=new NewsViewModel();
		$where="newscate_id=$catid";
		$count=$newsmodel->where($where)->count();
		$newspage=new Page($count,10);
		$data=$newsmodel->field('id,title,addtime')->where($where)->order('id desc')->limit($newspage->firstRow,$newspage->listRows)->select();
		$pageshow=$newspage->show();
		$this->assign('data',$data);
		$this->assign('catedata',$catedata);
		$this->assign('pageshow',$pageshow);
		$this->display();
	}
}
?>