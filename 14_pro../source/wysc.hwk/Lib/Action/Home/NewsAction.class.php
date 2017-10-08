<?php

class NewsAction extends Action {

    public function getleft($catid) {
        $catmodel = new CategoryModel();
        $currentcat = $catmodel->getself($catid);
        $this->assign('CAT', $currentcat);
        //查询当前分类的所有子类
        $catmodel->gettreedataforui($catid, $childs);
        //调用热卖商品
        $rmsp = R("Home/Common/getgoodsbycatid", array($catid, 7, 1));
        $this->assign('rmsp', $rmsp);
        $viewhistory = R("Home/Common/getviewhistory", array(4));
        $this->assign('viewhistory', $viewhistory);
        $this->assign('childs', $childs);
    }

    function show() {
        R('Home/Common/header');
        $newsid = (int) $this->_get('newsid');
        //echo $newsid;
        $newsmodel = new NewsViewModel();
        $data = $newsmodel->find($newsid);
        if ($data[isjump] == 1) {
            if ($data[jumpurl] != '') {
                header("location:$data[jumpurl]");
            } else {
                R("Home/Common/error", array("广告链接地址为空"));
                return;
            }
        }
        $this->getleft('topid=0'); //调用左半部分
        $this->assign('data', $data);
        $this->display();
    }

    function lists() {
        R('Home/Common/header');
        import("ORG.Util.Page");
        $this->getleft('topid=0'); //调用左半部分
        $catid = (int) $this->_get('catid');
        $page = (int) $_GET[page];
        $catemodel = new NewscateModel();
        $catedata = $catemodel->find($catid);
        $newsmodel = new NewsViewModel();
        $where = "newscate_id=$catid";
        $count = $newsmodel->where($where)->count();
        $newspage = new Page($count,10);
        $data = $newsmodel->field('id,title,addtime')->where($where)->order('id desc')->limit($newspage->firstRow, $newspage->listRows)->select();
        $pageshow = $newspage->show();
        $this->assign('data', $data);
        $this->assign('catedata', $catedata);
        $this->assign('pageshow', $pageshow);
        $this->display();
    }

}

?>