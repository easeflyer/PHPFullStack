<?php

class GoodtypeAction extends CommonAction {
    /**
     * 商品类型管理 
     */
    public function manage() {
        $model = new GoodtypeModel();
        $data = $model->select();
        $this->assign('data', $data);
        $this->display();
    }
    /**
     *  如果有提交 就 处理添加请求。
     * 如果没有提交，就显示模板
     */
    public function add() {
        if ($_POST) {
            $model = new GoodtypeModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->add()) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }
    }
    /**
     * 如果有提交 就 处理修改请求。
     * 如果没有提交，就显示模板
     */
    function edit() {
        $model = new GoodtypeModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->save()) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败');
                }
            }
        } else {
            $typeid = (int) $_GET[id];
            $data = $model->find($typeid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $model = new GoodtypeModel();
        $id = (int) $_GET[id];
        $model->delete($id) ? $this->success('删除成功') : $this->error('删除失败');
    }

}

?>