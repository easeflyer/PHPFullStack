<?php

class GoodsAction extends CommonAction {

    /**
     *  商品列表管理
     *  要把 所有查询 参数 向模板传递，因为 模板中，翻页操作，需要这些参数。
     *  也就是说 查询后的结果，如果翻页，要保持查询条件。
     */
    function manage() {
        $page = (int) $_GET[page];  // 分页：当前页
        $goodname = $_GET[goodname];   // 谁提交的数据因为 这个方法同时要处理查询请求，因此查询字符串必须保持。
        $this->assign('goodname', $goodname);
        $catid = $_GET[catid];
        $this->assign('catid', $catid);
        $brand = $_GET[brand];
        $this->assign('brand', $brand);
        $module = $_GET[module];
        $this->assign('module', $module);
        $where = '1=1'; // 准备构建查询条件字符串。
        if ($goodname)
            $where.=" and goodsname like '%" . $goodname . "%'";
        if ($catid)
            $where.=" and category_id=" . $catid;
        if ($brand)
            $where.=" and brand_id=" . $brand;
        if ($module)
            $where.=" and goodattr_id=" . $module;
        $page = max(1, $page);
        // 第一次使用 ViewModel 参考手册6.23
        $viewmodel = new GoodsViewModel();
        //print_r($viewmodel);exit;
        $total = $viewmodel->where($where)->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = min($totalpage, $page);
        $data = $viewmodel->where($where)->page($page, C('PAGE_SIZE'))->order('listorder asc,id desc')->select();
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        //查询商标：所有商标
        $brandmodel = M('Brand');
        $brands = $brandmodel->select();
        $this->assign('brands', $brands);
        //查询模型 所有属性类
        $goodattr = M('Goodattr');
        $moudles = $goodattr->select();
        $this->assign('modules', $moudles);
        $this->display();
    }

    /**
     *  添加商品
     * 需要添加 goods 表数据 和 Attval 商品属性值表 用于记录 自定义的属性值
     * @return boolean
     */
    function add() {
        if ($_POST) {
            if ($_POST[goodtype_id] == 0) {
                $_POST[goodtype_id] = null;
            }
            $model = new GoodsModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {

                if (!$model->add()) {
                    $this->error('添加失败');
                    return false;
                }
                //echo $model->addlastsql(); 这个方法根本不存在 应该是 getlastsql();
                // 下面的语句 用于添加商品属性 到 Attval 表
                $goodsid = $model->getLastInsID();
                // 注意 $_POST[attrlist] 是从 AttrlistAction.class.php 的 getlist 方法获得的。
                // 参见 add.html 模板的 getattrlist js 函数。
                $attrlist = $_POST[attrlist];
                $attrval = M('Attval');
                foreach ($attrlist as $key => $value) {
                    $attrdata = array();
                    //在多选情况下$value是一个数组需要转换成一个字符串
                    if (is_array($value)) {
                        $value = json_encode($value);
                    }
                    $attrdata[val] = $value;
                    $attrdata[goods_id] = $goodsid;
                    $attrdata[attrlist_id] = $key;
                    $attrval->add($attrdata);
                }
                $mysavedata[thumb] = $this->addthumb($goodsid);
                $model->where("id=$goodsid")->save($mysavedata);
                $this->success('添加成功');
            }
        } else {
            $goodsattr = new Model('Goodattr');
            $goodmodellist = $goodsattr->select();
            $this->assign('goodmodellist', $goodmodellist);

            $typemodel = M('Goodtype');
            $typedata = $typemodel->select();
            $this->assign('typedata', $typedata);
            $this->display();
        }
    }

    function del() {
        $model = M('Goods');
        $id = (int) $_GET[id];
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            //echo $model->getlastsql();
            $this->error('删除失败');
        }
    }

    function edit() {
        $model = new GoodsModel();
        // 处理修改
        if ($_POST) {
            //print_r($_POST);
            $goodsid = $_POST[id];

            $attrlist = $_POST[attrlist];
            $attmodel = M('Attval');
            foreach ($attrlist as $key => $value) {
                $data = array();
                if (is_array($value))
                    $value = json_encode($value);
                $data[val] = $value;
                $attmodel->where("id='$key'")->save($data);
            }
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                // 如果 文件 注意这里没有对  缩略图无修改的判断，造成错误：缩略图不修改 无法添加其他图片
                $easeaa = 0;
                // ease: 这里做了修改 因为 原代码 如果不修改缩略图 无法 添加 相册图 逻辑错误。
                //if ($_FILES[thumb][error] == 0) {
                // 如果有文件调整，就执行 addthumb 处理文件上传
                if (count($_FILES) > 0) {
                    // 1 上传所有图片  2 相册图保存 3 缩略图 路径返回 见 addthumb 方法
                    $thumb = $this->addthumb($goodsid);
                    if ($thumb)
                        $model->thumb = $thumb;
                }
                // 如果 相册编辑了。但是基本信息没有编辑。则造成编辑失败的提示。此问题可以不用处理不造成数据问题。
                if ($model->save()) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败或基本信息无修改');
                }
            }
            // 无 post 数据 显示 edit.html 修改表单    
        } else {
            $id = (int) $_GET[id];
            $goodsattr = new Model('Goodattr');
            $goodmodellist = $goodsattr->select();
            $this->assign('goodmodellist', $goodmodellist);
            $goodsdata = $model->find($id);
            $this->assign('goodsdata', $goodsdata);
            $attrval = new AttrlistViewModel();
            $attrvaldata = $attrval->where("goods_id='$id'")->select();
            $attrlistaction = A('Admin/Attrlist'); // 调用 admin 分组的 Attrlist 控制器
            $itemlist = array();
            foreach ($attrvaldata as $val) {
                // createinput(attrlist_id, 'attrlist[1]','机械工业出版社')
                $item[val] = $attrlistaction->createinput($val[attrlist_id], 'attrlist[' . $val[id] . ']', $val[val]);
                $item[name] = $val[name];
                $itemlist[] = $item;
            }
            $this->assign('itemlist', $itemlist);
            //查询相册图片
            $picmodel = M('Goodspic');
            $pics = $picmodel->where("goods_id='$id'")->select();
            $this->assign('pics', $pics);
            $typemodel = M('Goodtype');
            $typedata = $typemodel->select();
            $this->assign('typedata', $typedata);
            $this->display();
        }
    }

    /**
     * 前台 delimage 方法,通过 ajax 调用本方法,从 goodspic 数据库 删除图片。 并且返回 1,0
     */
    function delthumb() {
        $picid = (int) $_GET[picid];
        $picmodel = M('Goodspic');
        if ($picmodel->delete($picid)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
      循环处理 所有添加的图片
      1 上传所有图片  $file = uploadfile();
      2 相册图 存入 Goodspic 数据库
      3 缩略图 文件名及路径 返回


      调用 thumb 方法 生成 不同尺寸的图片。比如放大镜图片
      返回缩略图 的 包含路径的文件名
      edit 方法和 add 方法调用本方法 添加所有图片。
     */
    function addthumb($goodsid) {
        if (count($_FILES) > 0) {

            $test = 0; // 本句无意义，用于断点。
            // 返回上传结构的信息。参见uploadfile 函数
            // 下面这一句已经完成了所有图片的上传： 内部有对 $_FILES的处理。  这句非常关键。
            // $file[info] =  $upload->getUploadFileInfo()  也就是所有 文件的 信息 数组。
            $file = uploadfile();
            // 这里可以对 $file 进行  dump 了解结构
            // $file[info][key] 也就是 file 组件的 name  以下是 $file 的结构参考
            /**
             * array(2) (
              [errno] => (int) 0
              [info] => array(4) (
              [0] => array(8) (
              [name] => (string) 56a4a00aba05e.jpg
              [type] => (string) image/jpeg
              [size] => (int) 14285
              [key] => (string) thumb
              [extension] => (string) jpg
              [savepath] => (string) ./Public/Uploads/
              [savename] => (string) 2016/09/28/57eb638378286.jpg
              [hash] => (string) 6ba7febc9cbc3451edfa77788a4e96
             */
            $pics = array();
            //dump($file);exit;
            foreach ($file[info] as $item) {
                //如果是缩略图 这里是对 input name 属性的判断
                if ($item[key] == 'thumb') {
                    $thumb = $item[savename]; // $thumb 用于保存 缩略图文件名
                } else {
                    $pics[] = $item[savename]; // $pics 保存相册图 文件名
                }
            }

            // 下面的循环 保存了 相册图片 以及缩略图 注意只保存 一个文件名，缩略图文件名是程序拼出来的。见 thumb 函数
            $picmodel = M('Goodspic');
            foreach ($pics as $value) {
                $data = array();
                thumb($value, 800, 800); // 创建 放大镜图
                thumb($value, 350, 350); // 创建 普通图
                thumb($value, 64, 64);   // 创建小图 用于 点击的。
                $data[goods_id] = $goodsid;
                $data[picurl] = $value;  // 包含路径的文件名 保存入数据库
                $picmodel->add($data);
            }
            if (!$thumb)
                // 如果缩略图不存在 则返回 false; 代表缩略图 无修改  ease 如果return false 则造成数据库保存 0 的情况。所以应该返回 “”或者 null
                //return false;
                return null;
            return $thumb;  // 返回缩略图 的 包含路径的文件名
        }
    }

    /**
     * $_GET[ids]; 是一个 a,b,c,d 格式的字符串  由 manage.html 模板的 changeclass 函数提供
     * @return boolean
     */
    function move() {
        $tocategory = $_GET[to];
        $ids = $_GET[ids];
        $catmodel = new CategoryModel();
        if ($catmodel->haschild($tocategory)) {
            $this->error('该分类包含子类，不能存放商品');
            return false;
        }
        $goodmodel = M('goods');
        $savedata[category_id] = $tocategory;
        if ($goodmodel->where("id in($ids)")->save($savedata)) {
            $this->success("移动成功");
        } else {
            $this->error("移动失败");
        }
    }

    /**
     * $_GET[ids]; 是一个 a,b,c,d 格式的字符串  由 manage.html 模板的 changeclass 函数提供
     * 可以提供批量删除功能。
     */
    function dels() {
        $ids = $_GET[ids];
        $goodmodel = M('goods');
        if ($goodmodel->where("id in($ids)")->delete()) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

    // 修改排序字段，由前端 ajax 调用。 manage.html myorders 函数
    function listorder() {
        $id = (int) $_GET[id];
        $listorder = (int) $_GET[listorder];
        $goodsmodel = M('Goods');
        $savedata[listorder] = $listorder;
        if ($goodsmodel->where("id=$id")->save($savedata)) {
            echo 1;
        } else {
            echo $goodsmodel->getlastsql();
            echo 0;
        }
    }

}

?>