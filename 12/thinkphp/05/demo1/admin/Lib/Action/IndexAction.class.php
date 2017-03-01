<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	$this->display();
    }

    public function upload(){
        //header("content-type:text/html;charset=utf-8");
        import('ORG.Net.UploadFile'); //导入文件上传类包

        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小,避免过大附件
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型,安全
        $upload->savePath = './Public/Uploads/'; // 设置附件上传目录*****   
        
        if (!$upload->upload()) {// 上传错误提示错误信息  ,如果选择的是 .rar 则报错
            $this->error($upload->getErrorMsg());
        } else { // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            dump($info);
            $filePath = $upload->savePath . $info[0]["savename"];// 存入数据库
            echo $filePath;
        }
    }
}