<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    function add(){
        
        if($_POST){
            $user = new UsersModel();
            if($user->create()){
                //$user->add();
                echo "数据验证通过！";
            }else{
               exit($user->getError());
            }
        }else{
            func1();
            echo "<br />---------------<br />";
           $this->display(); 
        }
    }
    
    // 扩模块调用， 实例化其他控制器
    function test(){
        // MODULE_NAME 系统常量，当前模块的名称。
        echo "当前模块：" . MODULE_NAME . "<br />";
        
        // 跨模块调用 调用 User 模块的 test 方法
        $msg = R("User/test");
        echo $msg;
        echo "<br />-------------------------------------<br />";
        // 实例化其他模块 然后执行 user 模块的方法
        $userAction = A("User");
        echo $userAction->test();
    }
}