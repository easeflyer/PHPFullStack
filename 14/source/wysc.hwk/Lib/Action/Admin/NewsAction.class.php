<?php

class NewsAction extends CommonAction {

    function newscatemanage() {
        $this->display();
    }

    function newscateadd() {
        if ($_POST) {
            $catemodel = new NewscateModel();
            if (!$catemodel->create()) {
                $message = $catemodel->getError();
                $this->error($message);
            } else {
                $catemodel->add();
                $this->success('添加成功', U('News/newscatemanage'));
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

    function combotreejson() {
        $catemodel = new NewscateModel();
        $catemodel->getjsonforcombotree(0, &$data);
        echo json_encode($data);
    }

    function treegridjson() {
        $catemodel = new NewscateModel();
        $catemodel->gettreedataforui(0, &$data);
        echo json_encode($data);
    }

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
            $this->assign('data', $data);

            $this->display();
        }
    }

    function delcat() {
        $catid = (int) $_GET['catid'];
        if ($catid == 0)
            return false;
        $catemodel = new NewscateModel();
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

    function newsmanage() {
        $page = (int) $_GET[page];
        $newsmodel = new NewsViewModel();
        $total = $newsmodel->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = max(1, $page);
        $page = min($totalpage, $page);
        $data = $newsmodel->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data);
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
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

}

?>