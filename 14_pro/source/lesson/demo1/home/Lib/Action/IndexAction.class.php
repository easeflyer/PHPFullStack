<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        if($_POST){
            $model = new Model("address");
            // 设置验证规则 应该写在你自己的模型里。这里是临时的写法
            // 模型的 _validate 属性 参考手册:6.15
            $model->setProperty("_validate",array(
                array("contact","require","姓名必须填写"),
                array("phone","number","电话号码必须是数字"),
                array("address","3,5","地址的长度是3-5之间",0,"length"),
            ));
            // 验证结果提示
            if(!$model->create()) exit($model->getError()); 
            else echo "ok";
        }else{
            $this->display();
        };
    }
}