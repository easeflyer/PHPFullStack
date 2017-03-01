<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        //echo 1111;exit;
        $num = $_GET["n"];
        if ($num < 10) {
            $this->success("操作成功", U("Index/demo"));
        } else {
            $this->error("操作失败", U("er"));
            //$this->error("操作失败", "Index/er");
        }
    }

    function demo() {
        echo "ok";
    }

    function er() {
        echo "no";
    }

}
