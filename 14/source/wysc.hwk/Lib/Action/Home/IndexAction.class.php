<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function getleft($catid) {
        $catmodel = new CategoryModel();
        $currentcat = $catmodel->getself($catid);
        $this->assign('CAT', $currentcat);
        //查询当前分类的所有子类
        $catmodel->gettreedataforui($catid, $childs);
        //print_r($childs);
        //热卖商品
        $rmsp = R("Home/Common/getgoodsbycatid", array($catid, 25, 2));
        //print_r($rmsp);
        $this->assign('rmsp', $rmsp);
        $viewhistory=R("Home/Common/getviewhistory",array(4));
        $this->assign('viewhistory',$viewhistory);
        $this->assign('childs', $childs);
    }

    public function index() {
        R('Home/Common/header');
        $categorymodel = new CategoryModel();
        $categorymodel->gettreedataforui(0, $catdata);
        //print_r($catdata);exit;
        $this->assign('catdata', $catdata);
        //查询热销商品
        $goodmodel = M('Goods');
        $rxsp = $goodmodel->where("goodtype_id=1 and thumb!=''")->order('listorder asc, id desc')->limit(4)->select();
        $this->assign('rxsp', $rxsp);
        //调用最新上架
        $zxsj = $goodmodel->where("goodtype_id=5 and thumb!=''")->order('listorder asc, id desc')->limit(5)->select();
        //print_r($zxsj);
        $this->assign('zxsj', $zxsj);
        //调用新品推荐
        $xptj = $goodmodel->where("goodtype_id=3 and thumb!=''")->order('listorder asc, id desc')->limit(5)->select();
        $this->assign('xptj', $xptj);
        //调用大家电商品
        //categiry的id
        $djd = R("Home/Common/getgoodsbycatid", array(13, 2));
        $this->assign('djd', $djd);
        //调用图书
        $book = R("Home/Common/getgoodsbycatid", array(14, 1));
        $branddata = R("Home/Common/getbrand", array(16));
        //print_r($branddata);
        $this->assign('branddata', $branddata);
        $this->assign('book', $book);
        //调用图片轮换
        $newsmodel=new NewsModel();
        $pics=$newsmodel->field('id,title,thumb')->where("newscate_id=1 and thumb!=''")->limit(4)->order("id desc")->select();
        $this->assign('pics',$pics);
        //获得广告信息广告信息
        $ad1=$newsmodel->find(9);
        $this->assign('ad1',$ad1);
        $ad2=$newsmodel->find(10);
        $this->assign('ad2',$ad2);
        $ad3=$newsmodel->find(11);
        $this->assign('ad3',$ad3);
        $ad4=$newsmodel->find(12);
        $this->assign('ad4',$ad4);
        $this->display();
    }

    public function lists() {
        //每个页面调用
        R('Home/Common/header');
        $this->assign('myaction', 'lists');
        $catid = (int) $_GET[catid];
        $typeid = (int) $_GET[typeid];
        $gt = (int) $_GET[gt];
        $lt = (int) $_GET[lt];
        $ordershow = 'listorder asc';
        $order = $_GET[order];
        if (!$order) {
            $order = "iddesc";
        }
        $brandid = (int) $_GET[brandid];
        $catmodel = new CategoryModel();
        $parents = $catmodel->getallparent($catid);
        $topcat = array_shift($parents);
        $topid = $topcat[id];
        $this->getleft($catid);
        $catmodel = new CategoryModel();
        //热卖商品
        $xptj = R("Home/Common/getgoodsbycatid", array($catid, 3, 2));
        //print_r($rmsp);
        $this->assign('xptj', $xptj);
        $goodsmodel = new GoodsViewModel;
        //调用分页类实现商品分页
        import("ORG.Util.Page");
        $where = " 1=1 ";
        if ($catid) {
            $incls = R("Home/Common/getsubid", array($catid));
            $where.=" and category_id in($incls) ";
        }
        if ($typeid) {
            $typemodel = M('Goodtype');
            $typedata = $typemodel->find($typeid);
            $this->assign('typedata', $typedata);
            $where.=" and goodtype_id = $typeid";
        }
        if ($gt) {
            $where.=" and price < $gt ";
        }
        if ($lt) {
            $where.=" and price > $lt ";
        }
        if ($brandid) {
            $where.=" and brand_id = $brandid ";
        }
        if ($order == 'iddesc') {
            $ordershow.=",id desc";
        }
        if ($order == 'idasc') {
            $ordershow.=",id asc";
        }
        if ($order == 'pricedesc') {
            $ordershow.=",price desc";
        }
        if ($order == 'priceasc') {
            $ordershow.=",price asc";
        }
        $count = $goodsmodel->where($where)->count();
        if ($count == 0) {
            R("Home/Common/error", array("该栏目下没有商品"));
            return;
        }
        C('PAGE_SIZE', 12);
        $pagesize = C('PAGE_SIZE');
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        $data = $goodsmodel->where($where)->order($ordershow)->limit($page->firstRow . ',' . $page->listRows)->select();
        //print_r($data);
        //获取当前位置
        $pos = $catmodel->getallparent($catid);
        //echo $catid;
        //echo $catmodel->getLastsql();
        //print_r($pos);
        $CAT = $catmodel->getself($catid);
        $this->assign('CATEGORY', $CAT);
        $this->assign('pos', $pos);
        $this->assign('goodsdata', $data);
        $this->assign('pageshow', $pageshow);
        $branddata = R("Home/Common/getbrandbycatid", array($catid, $typeid));
        $pricerange = R("Home/Common/getpricerange", array($catid, $typeid));
        $this->assign('lt', $lt);
        $this->assign('gt', $gt);
        $this->assign('catid', $catid);
        $this->assign('typeid', $typeid);
        $this->assign('branddata', $branddata);
        $this->assign('pricerange', $pricerange);
        $this->assign('count', $count);
        $this->assign('brandid', $brandid);
        $this->assign('order', $order);
        $this->display();
    }

    public function show() {
        R('Home/Common/header');
        $goodid = (int) $_GET[goodid];
        R('Home/Common/addviewhistory', array($goodid));
        //setcookie('myfavor',null,time()-1000);
        R('Home/Common/getviewhistory');
        $model = new GoodsViewModel();
        $catmodel = new CategoryModel();
        $gooddata = $model->find($goodid);
        if (!$gooddata) {
            R("Home/Common/error", array("该商品不存在"));
            return;
        }
        $catid = $gooddata[category_id];
        $parents = $catmodel->getallparent($catid);
        $topcat = array_shift($parents);
        $CAT = $catmodel->getself($catid);
        $topid = $topcat[id];
        $this->getleft($topid);
        //print_r($gooddata);
        $this->assign('gooddata', $gooddata);
        $attrval = new AttrlistViewModel();
        $attrvaldata = $attrval->where("goods_id='$goodid'")->select();
        $itemlist = array();
        foreach ($attrvaldata as $val) {
            $item[val] = R('Home/Common/createinput', array($val[attrlist_id], 'attrlist[' . $val[id] . ']', $val[val]));
            $item[name] = $val[name];
            $itemlist[] = $item;
        }
        $this->assign('attrlist', $itemlist);
        $pics = R("Home/Common/getthumb", array($goodid));
        //$attrlist=R('Home/Common/getattrlist',array($gooddata[goodsattr_id]));
        //print_r($attrlist);
        $this->assign('pics', $pics);
        $pos = $catmodel->getallparent($catid);
        $this->assign('pos', $pos);
        $this->assign('CATEGORY', $CAT);
        //调用用户评论，分页调用
        import("ORG.Util.Page");
        $commentmodel=new CommentViewModel();
        $where="goods_id='$goodid'";
        $commentcount=$commentmodel->where($where)->count();
        $commentpage=new Page($commentcount,3);
        $commentdata=$commentmodel->where($where)->order('id desc')->limit($commentpage->firstRow,$commentpage->listRows)->select();
        $pageshow=$commentpage->show1();
        $this->assign('commentdata',$commentdata);
        $this->assign('pageshow',$pageshow);
        $this->display();
    }

    //调用指定商标内的商品
    function brandlist() {
        R('Home/Common/header');
        $goodsmodel = new GoodsViewModel();
        $brandmodel = M('Brand');
        $brandid = (int) $_GET['brandid'];
        $myaction = "brandlist";
        $this->getleft(0);
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        //调用筛选器
        $branddata = array();
        $branddata[] = $brandmodel->find($brandid);
        $this->assign('branddata', $branddata);
        $pricerange = R("Home/Common/getpricerange", array(0, 0, $brandid));
        $this->assign("pricerange", $pricerange);
        import("ORG.Util.Page");
        $where = ' 1=1 ';
        $gt = (int) $_GET[gt];
        $lt = (int) $_GET[lt];
        if ($gt) {
            $where.=" and price < $gt ";
        }
        if ($lt) {
            $where.=" and price > $lt ";
        }
        if ($brandid) {
            $where.=" and brand_id = $brandid ";
        }
        if ($order == 'iddesc') {
            $ordershow.=",id desc";
        }
        if ($order == 'idasc') {
            $ordershow.=",id asc";
        }
        if ($order == 'pricedesc') {
            $ordershow.=",price desc";
        }
        if ($order == 'priceasc') {
            $ordershow.=",price asc";
        }
        $count = $goodsmodel->where($where)->count();
        if ($count == 0) {
            R("Home/Common/error", array("没有商品"));
            return;
        }
        C('PAGE_SIZE', 12);
        $pagesize = C('PAGE_SIZE');
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        $data = $goodsmodel->where($where)->order("$ordershow")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('goodsdata', $data);
        $this->assign('count', $count);
        $this->assign('pageshow', $pageshow);
        $this->assign('myaction', $myaction);
        $this->assign('brandid', $brandid);
        $this->display('lists');
    }

    function allbrand() {
        import("ORG.Util.Page");
        R('Home/Common/header');
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        $brandmodel = M('Brand');
        $this->getleft(0);
        C('PAGE_SIZE', 12);
        $pagesize = C('PAGE_SIZE');
        $count = $brandmodel->count();
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        $data = $brandmodel->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('pageshow', $pageshow);
        $this->assign('branddata', $data);
        $this->display();
    }

    function search() {
        R('Home/Common/header');
        $keyword = $_POST[keyword];
        $brandid = (int) $_GET[brandid];
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        if ($keyword == '') {
            R("Home/Common/error", array("搜索关键字不能为空"));
            return;
        }
        $branddata = R("Home/Common/getbrandbycatid", array(0, 0));
        $pricerange = R("Home/Common/getpricerange", array(0, 0, $brandid, $keyword));
        $this->getleft(0);
        $this->assign('branddata', $branddata);
        $this->assign('pricerange', $pricerange);
        $goodsmodel = new GoodsViewModel();
        import("ORG.Util.Page");
        $where = ' 1=1 ';
        $gt = (int) $_GET[gt];
        $lt = (int) $_GET[lt];
        if ($gt) {
            $where.=" and price < $gt ";
        }
        if ($lt) {
            $where.=" and price > $lt ";
        }
        if ($brandid) {
            $where.=" and brand_id = $brandid ";
        }
        if ($order == 'iddesc') {
            $ordershow.=",id desc";
        }
        if ($order == 'idasc') {
            $ordershow.=",id asc";
        }
        if ($order == 'pricedesc') {
            $ordershow.=",price desc";
        }
        if ($order == 'priceasc') {
            $ordershow.=",price asc";
        }
        if ($keyword) {
            $where.= " and goodsname like '%$keyword%' ";
        }
        $count = $goodsmodel->where($where)->count();
        if ($count == 0) {
            R("Home/Common/error", array("没有商品"));
            return;
        }
        $myaction = "search";
        C('PAGE_SIZE', 2);
        $pagesize = C('PAGE_SIZE');
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        $data = $goodsmodel->where($where)->order("$ordershow")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('goodsdata', $data);
        $this->assign('count', $count);
        $this->assign('keyword', $keyword);
        $this->assign('myaction', $myaction);
        $this->assign('pageshow', $pageshow);
        $this->display('lists');
    }

}
