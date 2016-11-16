<?php
// 本类由系统自动生成，仅供测试用途
class UsersAction extends Action {
    public function index(){
    	header("content-type:text/html;charset=utf-8");
		$this->display();
    }
   function addAction(){
   		header("content-type:text/html;charset=utf-8");
   		import('ORG.Net.UploadFile'); //导入文件上传类包
   		
   		
   		$users = new Model("users");   		
   		$uName 		= $_POST["uName"];
   		$uPwd		 	= $_POST["uPwd"];
   		$uTel 			= $_POST["uTel"];
   		$uEmail 		= $_POST["uEmail"];
   		$uAddress 	= $_POST["uAddress"];
   		
   		$upload = new UploadFile();// 实例化上传类
   		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'Public/Uploads/';// 设置附件上传目录*****
		if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
		}else{	// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
				print_r($info);
				$filePath = $upload->savePath.$info[0]["savename"];
		}
		
		//数据库中需要保存文件名称和路径。
   		$sql = "insert into think_users(uName, uPwd, uTel, uEmail, uPic, uAddress)";
   		$sql.=" values('{$uName}', '{$uPwd}', '{$uTel}', '{$uEmail}', '{$filePath}', '{$uAddress}')";

   		$users->query($sql);
   }
   function usersList(){
   		import('ORG.Util.Page');
   		
   		$users = new Model("users");   
   		$count = $users->count();  //求记录数
   		$Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
   		$show = $Page->show(); //页码 上一页 下一页
   		//$Page->firstRow 起始位置
   		// $Page->listRows  记录长度
   		$rs = $users->limit($Page->firstRow.','.$Page->listRows)->select(); 
   		$this->assign("rs",$rs);
   		$this->assign("show",$show);
   		$this->display();
   }
   function del(){
   		header("content-type:text/html;charset=utf-8");
   		
   		$uId = $_GET["uId"];
   		//删除文件
   		$users = new Model("users");   
   		$sql = "select uPic from think_users where uId={$uId}";
   		$rs = $users->query($sql);
   		if(is_file($rs[0]["uPic"])){
   			unlink($rs[0]["uPic"]);
   		}else{
   			//echo "文件不在";
   		}
   		$sql_1 = "delete from think_users where uId={$uId}";
   		$users->execute($sql_1); 		
   }
   function updateView(){
   	//接受前面的id
   	$uId = $_GET["uId"];
   	$users = new Model("users");   
   	$sql = "select *  from think_users where uId={$uId}";
   	$rs = $users->query($sql);
   	$this->assign("rs",$rs);
   	 $this->display();
   }
   function updateAction(){
   		$users = new Model("users");   
   		
   		$uId 			= $_GET["uId"];
   		$uName 		= $_POST["uName"];
   		$uPwd		 	= $_POST["uPwd"];
   		$uTel 			= $_POST["uTel"];
   		$uEmail 		= $_POST["uEmail"];
   		$uAddress 	= $_POST["uAddress"];
   		$uPic 			= $_FILES["uPic"];// 接受图片目的 判断图片有没有修改
   		
   		if(strlen($uPic["name"])>0){  //有图片修改
   			import('ORG.Net.UploadFile'); //导入文件上传类包
	   		$upload = new UploadFile();// 实例化上传类
	   		$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  'Public/Uploads/';// 设置附件上传目录*****
			if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
			}else{	// 上传成功 获取上传文件信息
					$info = $upload->getUploadFileInfo();
					print_r($info);
					$filePath = $upload->savePath.$info[0]["savename"];
			}
   		}else{ //没有图片修改
		   		$sql = "select uPic from think_users where uId={$uId}";
		   		$rs = $users->query($sql);
		   		$filePath = $rs[0]["uPic"];
   		}
   		echo $filePath;
   		
   		$sql="update think_users set uName='{$uName}', uPwd='{$uPwd}', uTel='{$uTel}', uEmail='{$uEmail}', uPic='{$filePath}', uAddress='{$uAddress}' where uId={$uId}";
   		$users->execute($sql);  	
   }
   
   
   
   
   
   
   
   
   
   
   
   
}