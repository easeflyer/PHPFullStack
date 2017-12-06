<?php

class BrandAction extends CommonAction {
    /**
     * 显示品牌列表 以及构建各种操作 利用 EasyUI 做为前台
     */
    function managebrand() {
        C('PAGE_SIZE', 5); // 临时修改配置 每页5条数据 因为有图片
        $page = (int) $_GET[page];
        $page = max(1, $page); // 取最大值 当前页 貌似可以没有这行
        $model = new BrandModel();
        $total = $model->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $model->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data); // 数据
        $this->assign('total', $total); // 数据条数
        $this->assign('page', $page); //当前页
        $this->display('managebrand');
    }
    /**
     * 添加商标动作,以及添加商标表单
     * @return type 商标图片上传失败则返回,无返回值
     */
    function addbrand() {
        if ($_POST) {
            $model = new BrandModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if (count($_FILES) > 0) {
                    $file = uploadfile();
                    if ($file[errno] == 1) {
                        $this->error("图片上传失败");
                        return;
                    }
                    $model->image = $file['info'][0]['savename'];
                }else{die("33333");}
                $model->add();
                $this->success('添加成功', U('Brand/managebrand'));
            }
        } else {
            $this->display();
        }
    }
    /**
     * 编辑品牌动作,以及编辑表单
     * @return type 如果文件上传失败 返回 无返回值
     * 
     */
    function editbrand() {
        $model = new BrandModel();
        if ($_POST) {
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($_FILES[image][error] == 0) {

                    $file = uploadfile();
                    if ($file[errno] == 1) {
                        $this->error("图片上传失败");
                        return;
                    }
                    $model->image = $file['info'][0]['savename'];
                }
                if ($model->save()) {
                    $this->success('修改成功');
                } else {

                    $this->error('修改失败');
                }
            }
        } else {
            $brandid = (int) $_GET['brandid'];

            $data = $model->find($brandid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function delbrand() {
        $brandid = (int) $_GET['brandid'];
        $model = new BrandModel();
        if ($model->delete($brandid)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    function getcombojson() {
        $model = new BrandModel();
        $data = $model->field('id,brandname')->select();
        $ret = array();
        foreach ($data as $val) {
            $val1[id] = $val[id];
            $val1[text] = $val[brandname];
            $ret[] = $val1;
        }
        echo json_encode($ret);
    }

}

?>