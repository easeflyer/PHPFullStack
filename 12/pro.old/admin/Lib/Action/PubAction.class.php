<?php
// 本类由系统自动生成，仅供测试用途
class PubAction extends Action {
    public function index(){
    	header("content-type:text/html;charset=utf-8");
		$this->display();
    }
    function addAction(){
    	header("content-type:text/html;charset=utf-8");
    	import('ORG.Net.UploadFile'); //导入文件上传类包
    	$pName = $_POST["pName"];
    	$pInfo = $_POST["pInfo"];
    	//$pLogo = "111";//$_FIELS["pLofo"];
    	
    	$upload = new UploadFile();// 实例化上传类
   		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'Public/Uploads/pub/';// 设置附件上传目录*****
		if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
		}else{	// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
				$filePath = $upload->savePath.$info[0]["savename"];
		}
    	$pub = new Model("pub");
    	$sql = "insert into think_pub(pName, pLogo, pInfo) values('{$pName}','{$filePath}','{$pInfo}')";
    	$pub->execute($sql);
    }
    function pubList(){
    	import('ORG.Util.Page');
    	$pub = new Model("pub");
    	$count = $pub->count();  //求记录数
    	$Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
   		$show = $Page->show(); //页码 上一页 下一页
    	$rs = $pub->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign("rs",$rs);
    	$this->assign("show",$show);
    	$this->display();
    }
  
   
   
   
   
   
   
   
   
   
   
   
   
}