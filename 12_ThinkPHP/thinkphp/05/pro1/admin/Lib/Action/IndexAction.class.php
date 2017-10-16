<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->display();
    }
    function checkLogin(){
        $ckNum = $_POST['ckNum'];  // 验证码
        $aName = $_POST['aName'];  // 用户名
        $aPwd = $_POST['aPwd'];  // 用户名
        if( md5($ckNum) != session("verify") ){
            $this->error("验证码错误","index");
            exit;
        }
        
        $ad = new Model("admin");
        $rs = $ad->where("aName='{$aName}'")->find();
        if( !(count($rs) > 0) ){
            $this->error("用户不存在","index");
            exit;
        }
        
        $pwd = $rs["aPwd"];
        if($aPwd != $pwd){
            $this->error("密码输入错误","index");
            exit;
        }
        
        $this->success("登录成功!","main");
        
    }
    function main(){
    	$this->display();
    }
    function top(){
    	$this->display();
    }
    function left(){
    	$this->display();
    }
    function right(){
    	$this->display();
    }
}