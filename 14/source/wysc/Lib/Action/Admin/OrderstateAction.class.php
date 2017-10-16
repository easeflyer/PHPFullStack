<?php
class OrderstateAction extends CommonAction {
	function manage(){
		$model=new OrderstateModel();
		$data=$model->select();
		$this->assign('data',$data);
		$this->display();
	}
	function add(){
		if($_POST){
			$model=new OrderstateModel();
			if(!$model->create()){
				$message=$model->getError();
				$this->error($message);
				return;
			}
			if($model->add()){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->display();
		}
	}
	function edit(){
		$model=new OrderstateModel();
		if($_POST){
			$model=new OrderstateModel();
			if(!$model->create()){
				$message=$model->getError();
				$this->error($message);
				return;
			}
			if($model->save()){
				$this->success('编辑成功');
			}else{
				$this->error('编辑失败');
			}
		}else{
			$modelid=(int)$_GET[id];
			
			$data=$model->find($modelid);
			$this->assign('data',$data);
			$this->display();
		}
	}
	function del(){
		$model=new OrderstateModel();
		$modelid=(int)$_GET[id];
		if($model->delete($modelid)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}
?>