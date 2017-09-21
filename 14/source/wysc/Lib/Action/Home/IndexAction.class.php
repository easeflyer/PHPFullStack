<?php
/**
 * ease:本代码全部已读
 */
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    /**
     * 用于给列表页,详情页左侧栏目的模板变量赋值。
     * 
     * 列表页会调用$this->getleft($topid);
     * 内容页会调用$this->getleft($topid);
     * 
     * 本方法操作:
     * 给 CAT 传值 catid 对象:$this->assign('CAT', $currentcat);
     * 给 rmsp 传值 热卖商品 数据集 $this->assign('rmsp', $rmsp);
     * 给 viewhistory 传值 用户浏览历史数据集 $this->assign('viewhistory', $viewhitory);
     * 给 childs 传值catid 整个树形对象数组: $this->assign('childs', $childs);
     * @param type $catid
     */
    public function getleft($catid) {
        $catmodel = new CategoryModel();
        $currentcat = $catmodel->getself($catid); // 获得 catid 对象。
        $this->assign('CAT', $currentcat);
        //print_r($currentcat);exit;
        //查询当前分类的所有子类
        $catmodel->gettreedataforui($catid, $childs); // 采用递归方式获得 $catid 分类树。
        //返回热卖商品数据集 第三个参数为1, 7条记录
        $rmsp = R("Home/Common/getgoodsbycatid", array($catid, 7, 1));
        $this->assign('rmsp', $rmsp);
        $viewhitory = R("Home/Common/getviewhistory", array(4)); //获得用户浏览过的商品数据集 传递了一个参数 4
        $this->assign('viewhistory', $viewhitory);
        $this->assign('childs', $childs);
    }

    /**
     *  《首页》
     * 
     *  首页结构 见 印象笔记
     *  包含 1 分类列表
     *          2 三种类型的商品展示：热销，新品，推荐
     *          3 调用：大家电： R("Home/Common/getgoodsbycatid", array(1, 5)); 
     *          4 调用：图书：R("Home/Common/getgoodsbycatid", array(7, 5));
     */
    public function index() {
        R('Home/Common/header');  // 执行几个 assign 负责渲染部分变量，
        $categorymodel = new CategoryModel(); // 分类模型
        $categorymodel->gettreedataforui(0, $catdata); // $catdata 作为引用传入 获得树形 json 数据。
        $this->assign('catdata', $catdata);
        // 测试输出 树形数据。
        //print_r($catdata);exit;  
        //查询4个热销商品
        $goodmodel = M('Goods');
        // goodtype 1热销 2 最新 3 推荐  ; 缩略图 不为空
        $rxsp = $goodmodel->where("goodtype_id=1 and thumb!=''")->order('listorder asc, id desc')->limit(4)->select();
        $this->assign('rxsp', $rxsp);
        //调用最新产品
        $zxsj = $goodmodel->where("goodtype_id=2 and thumb!=''")->order('listorder asc, id desc')->limit(5)->select();
        $this->assign('zxsj', $zxsj);
        //调用新品推荐
        $xptj = $goodmodel->where("goodtype_id=3 and thumb!=''")->order('listorder asc, id desc')->limit(5)->select();
        $this->assign('xptj', $xptj);
        //调用大家电商品
        $djd = R("Home/Common/getgoodsbycatid", array(1, 5));

        $this->assign('djd', $djd);
        //调用图书
        $book = R("Home/Common/getgoodsbycatid", array(7, 5));
        $branddata = R("Home/Common/getbrand", array(16));
        $this->assign('branddata', $branddata);
        $this->assign('book', $book);
        //调用图片轮换  newscate_id=2  这个分类负责 图片轮换的图。 参见 newscate 表
        $newsmodel = new NewsModel();
        
        $pics = $newsmodel->field('id,title,thumb')->where("newscate_id=2 and thumb!=''")->limit(4)->order("id desc")->select();
        $this->assign('pics', $pics);
        //获得广告信息 调用对应的 数据，显示对位置即可。
        $ad1 = $newsmodel->find(15);
        $this->assign('ad1', $ad1);
        $ad2 = $newsmodel->find(16);
        $this->assign('ad2', $ad2);
        $ad3 = $newsmodel->find(17);
        $this->assign('ad3', $ad3);
        $ad4 = $newsmodel->find(18);
        $this->assign('ad4', $ad4);
        //echo "ROOT:".__APP__;
        $this->display();
        
    }

    /**
     *   《列表页》
     *   首页点击 任意 分类 调用本方法
     * @return type
     */
    public function lists() {
        R('Home/Common/header');
        $this->assign('myaction', 'lists');  // 因为 模板中用的是 $myaction ,如果要调用本方法 则用 lists 替换
        $catid = (int) $_GET[catid];    // 分类 id
        $typid = (int) $_GET[typeid];   // 类型 id 热销，新品，推荐
        $gt = (int) $_GET[gt];   // 最小值    价格区间 筛选 参考列表页
        $lt = (int) $_GET[lt];   // 最大值
        $ordershow = 'listorder asc';    // $goodsmodel  的 ->order($ordershow) 参数 用于排序  listorder 商品的自定义排序参数
        $order = $_GET[order];   // $order 是 网页传送的排序参数 ，最终被翻译成 $ordershow 比如：iddesc 翻译成 id desc
        if (!$order) {
            $order = "iddesc";
        }

        $brandid = (int) $_GET[brandid];
        $catmodel = new CategoryModel();
        $parents = $catmodel->getallparent($catid); //返回 $catid 所有父类对象数组,包含自己在内。 自己在最后。
        //print_r($parents); 
        $topcat = array_shift($parents); // 获得最顶层分类对象。同时 $parents 也将被删掉顶层对象。
        //print_r($parents);exit;
        $topid = $topcat[id];           // 顶层分类的 id
        
        // 这里面有对浏览记录的处理 getviewhistory（）
        $this->getleft($topid);

        //调用热卖商品
        $xptj = R("Home/Common/getgoodsbycatid", array($catid, 3, 3));
        $this->assign('xptj', $xptj);
        $goodsmodel = new GoodsViewModel();
        //调用分页类实现商品分页
        import("ORG.Util.Page");
        $where = " 1=1 ";
        if ($catid) {  // 如果有分类 参数 则需要 调用所有子类 id 加入条件如下
            $incls = R("Home/Common/getsubid", array($catid));
            $where.=" and category_id in($incls) ";
        }
        if ($typid) { // 如果有 商品类型参数 则需要调用 商品类型数据 用于渲染页面。同时加入查询条件
            $typemodel = M('Goodtype');
            $typedata = $typemodel->find($typid);
            $this->assign('typedata', $typedata);
            $where.=" and goodtype_id = $typid";
        }
        
        // 下面的所有 if 用于构造 goodsmodel 的 $where 和 $order
        //  $gt $lt 负责 价格区间的筛选 $order 负责排序  $brandid 负责品牌筛选
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
        C('PAGE_SIZE', 12);  // 修改每页的默认数据量 如果不修改，可能 thinkphp 内部要调用这个值
        $pagesize = C('PAGE_SIZE');
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        // 商品数据
        $data = $goodsmodel->where($where)->order("$ordershow")->limit($page->firstRow . ',' . $page->listRows)->select();
        //获取当前位置
        
        // 获得所有父类对象数组，也就是从自己开始所有父类对象 数组。
        $pos = $catmodel->getallparent($catid);  // 用于面包屑导航
        $CAT = $catmodel->getself($catid);
        $this->assign('CATEGORY', $CAT); // 当前分类
        $this->assign('pos', $pos); // 用于面包屑导航
        $this->assign('goodsdata', $data);
        $this->assign('pageshow', $pageshow); // 分页 组件
        $branddata = R("Home/Common/getbrandbycatid", array($catid, $typid));
        $pricerange = R("Home/Common/getpricerange", array($catid, $typid));
        $this->assign('lt', $lt);
        $this->assign('gt', $gt);
        $this->assign('catid', $catid);
        $this->assign('typeid', $typid);
        $this->assign('branddata', $branddata);
        $this->assign('pricerange', $pricerange);
        $this->assign('count', $count);
        $this->assign('brandid', $brandid);
        $this->assign('order', $order);
        $this->display();
    }

    /**
     *   《内容页》
     * @return 详情页 
     */
    public function show() {
        R('Home/Common/header');
        $goodid = (int) $_GET[goodid];
        // $gooddata 包含了，商品goods,商标Brand,分类Category,属性Goodattr（图书，服装）,类型Goodtype（热卖，推荐） 表的信息
        // 注意这个视图，只是调用了其他几个表的 name 属性
        $model = new GoodsViewModel();
        $catmodel = new CategoryModel();
        $gooddata = $model->find($goodid);
        if (!$gooddata) {
            R("Home/Common/error", array("该商品不存在"));
            return;
        }
        // 添加浏览历史 就是设置 $_COOKIE[myfavor] 的值
        R('Home/Common/addviewhistory', array($goodid));
        $catid = $gooddata[category_id];
        $parents = $catmodel->getallparent($catid);
        $topcat = array_shift($parents);
        $CAT = $catmodel->getself($catid);
        $topid = $topcat[id];
        // 包含get viewhistory 的浏览历史 变量的渲染和赋值
        $this->getleft($topid);// 完成很多 assign赋值 用于构造页面左侧栏目 topid 是最上级分类id
        $this->assign('gooddata', $gooddata);
        // 根据 attrval 表调取 attlist 表的对应 属性细节。构造一个视图
        // $attrvaldata 就是这个视图的 数据集
        $attrval = new AttrlistViewModel();
        $attrvaldata = $attrval->where("goods_id='$goodid'")->select();
        $itemlist = array();
        // val 是当前产品属性视图的一行记录 循环 处理，$item[val] 将保存 经过 html 编码的 属性显示结果
        // Home/Common/createinput 用于构造这个 html 结果
        foreach ($attrvaldata as $val) {
            $item[val] = R('Home/Common/createinput', array($val[attrlist_id], 'attrlist[' . $val[id] . ']', $val[val]));
            $item[name] = $val[name];
            $itemlist[] = $item;
        }
        $this->assign('attrlist', $itemlist);
        //$attrlistaction=A('Admin/Attrlist');
        // $pics 是 goodid 产品所有图片数组：包含 路径，文件名
        // 注意这里保存到数据库的 只是 简单的大图文件名，但是 图片上传的时候，是分别保存了：图标，小图，大图三部分
        // 图标用于点击，小图用于显示，大图用于放大镜效果
        $pics = R('Home/Common/getthumb', array($goodid));
        //$attrlist=R('Home/Common/getattrlist',array($gooddata[goodattr_id]));
        //print_r($attrlist);
        $this->assign('attrlist', $itemlist);
        $this->assign('pics', $pics);
        $pos = $catmodel->getallparent($catid);
        $this->assign('pos', $pos);
        $this->assign('CATEGORY', $CAT);
        //调用用户评论，分页调用
        import("ORG.Util.Page");
        $commentmodel = new CommentViewModel();
        $where = "goods_id='$goodid'";
        $commentcount = $commentmodel->where($where)->count();
        $commentpage = new Page($commentcount, 3);

        $commentdata = $commentmodel->where($where)->order('id desc')->limit($commentpage->firstRow, $commentpage->listRows)->select();
        $pageshow = $commentpage->show1(); // 分页点击样式1
        $this->assign('commentdata', $commentdata); // 评论数据集
        $this->assign('pageshow', $pageshow);
        $this->display();
    }

    /**
     * 调用指定商标内的商品
     * 首页底部 点击 对应商标调用本方法。
     * 参数:$_GET['brandid']; 商标id
     * 参数:$_GET[gt]; $_GET[lt]; 价格范围。
     *  $this->display('lists');
     */
    function brandlist() {
        R('Home/Common/header');
        $goodsmodel = new GoodsViewModel();
        $brandmodel = M('Brand');
        $brandid = (int) $_GET['brandid'];
        $myaction = "brandlist";
        //echo $brandid;
        $this->getleft(0);
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        //调用删选器
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
    /**
     * 点击首页底部"更多品牌" 调用本页。
     */
    function allbrand() {
        import("ORG.Util.Page");
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        R('Home/Common/header');
        $brandmodel = M('Brand');
        $this->getleft(0);
        $pagesize = C('PAGE_SIZE');
        $count = $brandmodel->count();
        $page = new Page($count, $pagesize);
        $pageshow = $page->show();
        $data = $brandmodel->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('pageshow', $pageshow);
        $this->assign('branddata', $data);
        $this->display();
    }
    /**
     * 页面搜索框 输入关键字 点击搜索调用本页。
     * 参数:关键词 $_GET[keyword];
     * 参数:品牌 $_GET[brandid];
     * 参数:价格区间 $_GET[gt];$_GET[lt];
     * @return type
     */
    function search() {
        $keyword = $_GET[keyword];
        $brandid = (int) $_GET[brandid];
        $xptj = R("Home/Common/getgoodsbycatid", array(0, 3));
        $this->assign('xptj', $xptj);
        R('Home/Common/header');
        if ($keyword == '') {
            R("Home/Common/error", array("搜索关键字不能为空"));
            return;
        }
        // 获得品牌数据对象 数据集
        $branddata = R("Home/Common/getbrandbycatid", array(0, 0));
        // 获得价格区间
        $pricerange = R("Home/Common/getpricerange", array(0, 0, $brandid, $keyword));
        $this->getleft(0); // 0 参数左侧 显示主分类
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
        C('PAGE_SIZE', 12);
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
