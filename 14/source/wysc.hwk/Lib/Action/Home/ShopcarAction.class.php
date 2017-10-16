<?php

class ShopcarAction extends Action {

    //将商品加入购物车
    //当用户未登录时使用session来存储购物车中的数据
    //用户已经登录使用数据表存储购物车中的数据
    //当用户登陆时需要将session中的数据一次性加入到数据表中，并清除session中的数据
    //$_session[shopcar];
    function addshopcar() {
        if (!R("Home/User/checkboxlogin")) {
            $this->addforunlogin($_POST);
        } else {
            $this->addlogin();
        }
    }

    private function addforunlogin($post) {
        $goodmodel = M('Goods');
        $goodid = $post[goods_id];
        $goodsinfo = $goodmodel->find($goodid);
        //print_r($goodsinfo);
        if (!$goodsinfo) {
            R("Home/Common/error", array("该商品不存在"));
            return false;
        }
        if (!array_key_exists($goodid, $_SESSION[shopcar])) {
            $sessionitem = $post;
            $sessionitem[goodsname] = $goodsinfo[goodsname];
            $sessionitem[thumb] = $goodsinfo[thumb];
            $sessionitem[price] = $goodsinfo[price] * $post[num];
            //print_r($sessionitem);
            $_SESSION[shopcar][$goodid] = $sessionitem;
            //print_r($_SESSION);
        } else {
            $_SESSION[shopcar][$goodid][num]+=$post[num];
            $_SESSION[shopcar][$goodid][price] = $goodsinfo[price] * $_SESSION[shopcar][$goodid][num];
        }
        R("Home/Common/error", array("商品成功加入购物车"));
        return false;
    }

    private function addlogin() {
        $userid = $_SESSION[user][id];
        //echo $userid;
        $goodmodel = M('Goods');
        $goodid = $_POST[goods_id];
        $goodsinfo = $goodmodel->find($goodid);
        if (!$goodsinfo) {
            R("Home/Common/error", array("该商品不存在"));
            return false;
        }
        $shopcarmodel = new ShopcarModel();
        $where = "users_id='$userid' and goods_id='$goodid'";
        if ($shopcarmodel->where($where)->find()) {
            //print_r($shopcarmodel);
            $shopcarmodel->num+=$_POST[num];
            $shopcarmodel->price = $goodsinfo[price] * $shopcarmodel->num * $userid = $_SESSION[user][discount] / 100;
            if ($shopcarmodel->save()) {
                R("Home/Common/error", array("商品成功加入购物车"));
                return false;
            } else {
                R("Home/Common/error", array("购物车添加失败"));
                return false;
            }
        } else {
            $_POST[users_id] = $userid;
            $_POST[price] = $_POST[num] * $goodsinfo[price] * $userid = $_SESSION[user][discount] / 100;
            if (!$shopcarmodel->create()) {
                $message = $shopcarmodel->getError();
                R("Home/Common/error", array($message));
                return;
            }
            if ($shopcarmodel->add()) {
                R("Home/Common/error", array("商品成功加入购物车"));
                return false;
            } else {
                R("Home/Common/error", array("购物车添加失败"));
                return false;
            }
        }
    }

    //当用户登陆时需要将session中的数据一次性加入到数据表中，并清除session中的数据
    function refreshshopcar() {
        //print_r($_SESSION);
        if (!is_array($_SESSION[shopcar])) {
            return false;
        }
        foreach ($_SESSION[shopcar] as $value) {
            $shopcardata = array();
            $shopcardata[num] = $value[num];
            $discount = $_SESSION[user][discount];
            $shopcardata[price] = $value[price] * $discount / 100;
            $shopcardata[users_id] = $_SESSION[user][id];
            $shopcardata[goods_id] = $value[goods_id];
            //print_r($shopcardata);
            $shopcarmodel = new ShopcarModel();
            $shopcarmodel->add($shopcardata);
            //print_r($shopcarmodel);
            //echo $shopcarmodel->getlastsql();
        }
    }

}

?>