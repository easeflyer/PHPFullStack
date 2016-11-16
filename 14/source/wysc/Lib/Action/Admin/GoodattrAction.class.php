<?php

class GoodattrAction extends CommonAction {

    /**
     * 显示
     */
    public function managegoodattr() {
        $page = (int) $_GET[page];
        $page = max(1, $page);
        $model = new GoodattrModel();
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data); // 数据表
        $this->assign('total', $total); // 总数据条数
        $this->assign('page', $page); // 当前页
        $this->display();
    }

    public function addgoodattr() {
        if ($_POST) {
            $model = new GoodattrModel();
            print_r($_POST);exit;
            if (!$model->create()) {
                $message = $model->getDbError();
                echo $message;exit;
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

    function editattr() {
        $model = new GoodattrModel();
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
            $attrid = (int) $_GET[id];
            $data = $model->find($attrid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $model = new GoodattrModel();
        $id = (int) $_GET[id];
        $model->delete($id) ? $this->success('删除成功') : $this->error('删除失败');
    }

    function getcombojson() {
        $model = new GoodattrModel();
        $data = $model->field('id,attrname')->select();
        $ret = array();
        foreach ($data as $val) {
            $val1[id] = $val[id];
            $val1[text] = $val[attrname];
            $ret[] = $val1;
        }
        echo json_encode($ret);
    }

}

?>