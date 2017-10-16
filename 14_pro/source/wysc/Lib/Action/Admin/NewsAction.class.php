<?php

class NewsAction extends CommonAction {
    /**
     * 新闻栏目管理
     */
    function newscatemanage() {
        $this->display();
    }
    /**
     * 添加子栏目
     * 新闻栏目管理 调用本方法
     * 如果catid=0则表示要添加顶级分类
     */
    function newscateadd() {
        if ($_POST) {
            $catemodel = new NewscateModel();
            if (!$catemodel->create()) {
                $message = $catemodel->getError();
                $this->error($message);
            } else {
                $catemodel->add();
                $this->success('添加成功');
            }
        } else {
            $catid = (int) $_GET['catid'];
            if ($catid == 0) {
                $catid = "作为顶级分类";
            }
            $this->assign('catid', $catid);
            $this->display();
        }
    }
    /**
     * 新闻分类 树
     * 新闻分类管理 - 添加分类 newscateadd.html 调用本方法
     */
    function combotreejson() {
        $catemodel = new NewscateModel();
        $catemodel->getjsonforcombotree(0, $data); // &$data
        echo json_encode($data);
    }

    /**
     * 提供 newscatemanage.html treegrid 数据
     * gettreedataforui 采用递归算法, 参考产品分类算法。
     */
    function treegridjson() {
        $catemodel = new NewscateModel();
        $catemodel->gettreedataforui(0, $data); //&$data
        echo json_encode($data);
    }
    /**
     * 编辑新闻分类
     */
    function newscateedit() {
        $catemodel = new NewscateModel();
        if ($_POST) {
            if (!$catemodel->create()) {
                $message = $catemodel->getError();
                $this->error($message);
            } else {
                $catemodel->save();
                $this->success('修改成功');
            }
        } else {
            $catid = (int) $_GET['catid'];
            $data = $catemodel->getself($catid);
            if ($data[pid] == 0) {
                $data[pid] = '作为顶级分类';
            }
            //这里用 $data 数据填充表单
            $this->assign('data', $data);

            $this->display();
        }
    }
    /**
     * 删除新闻分类
     * @return boolean
     */
    function delcat() {
        $catid = (int) $_GET['catid'];
        if ($catid == 0)
            return false;
        $catemodel = new NewscateModel();
        //判断如果包含子分类则不允许删除
        if ($catemodel->haschild($catid)) {
            $this->error("该栏目当中包含子类");
            return false;
        }
        if ($catemodel->delete($catid)) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }
    /**
     * 新闻管理
     * 显示新闻列表
     */
    function newsmanage() {
        $page = (int) $_GET[page];
        $newsmodel = new NewsViewModel(); // 新闻连接 新闻分类表
        $total = $newsmodel->count();  // 新闻总数
        $totalpage = ceil($total / C('PAGE_SIZE')); // 总页数
        $page = max(1, $page);
        $page = min($totalpage, $page);
        $data = $newsmodel->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data);   //新闻数据
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    function newsadd() {
        if ($_POST) {
            $files = uploadfile();
            $newsmodel = new NewsModel();
            if (!$newsmodel->create()) {
                $message = $newsmodel->getError();
                $this->error($message);
            } else {
                if ($files[errno] == 0)
                    $newsmodel->thumb = $files[info][0][savename];
                $newsmodel->addtime = time();
                if ($newsmodel->add()) {
                    $this->success('添加成功');
                } else {
                    //echo $newsmodel->getlastsql();
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }
    }

    function newsedit() {
        $newsmodel = new NewsModel();
        if ($_POST) {
            if (!$newsmodel->create()) {
                $message = $newsmodel->getError();
                $this->error($message);
            } else {
                $files = uploadfile();
                if ($files[errno] == 0)
                    $newsmodel->thumb = $files[info][0][savename];
                $newsmodel->save();
                $this->success('修改成功');
            }
        }else {
            $newsid = (int) $_GET[id];
            $data = $newsmodel->find($newsid);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function newsdel() {
        $model = new NewsModel();
        $id = (int) $_GET[id];
        $model->delete($id) ? $this->success('删除成功') : $this->error('删除失败');
    }

}

?>