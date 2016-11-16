<?php
/**
 * ease:本代码全部已读
 */
class ShopcarAction extends Action {

    //将商品加入购物车
    //当用户未登录时使用session来存储购物车中的数据
    //用户已经登录使用数据表存储购物车中的数据
    //当用户登陆时需要将session中的数据一次性加入到数据表中，并清除session中的数据
    //$_session[shopcar];
    function addshopcar() {
        if (!R("Home/User/checkboxlogin")) {
            //print_r($_POST);exit;
            $this->addforunlogin($_POST); // 未登录 添加购物车到 session
        } else {
            //print_r($_POST);exit;
            $this->addlogin();            // 登陆 添加到数据表
        }
    }
    /**
     * 用户未登录添加产品到 session
     * @param type $post goods_id,num 产品id 和数量
     * @return boolean 
     */
    private function addforunlogin($post) {
        $goodmodel = M('Goods');
        $goodid = $post[goods_id];
        $goodsinfo = $goodmodel->find($goodid);
        if (!$goodsinfo) {
            R("Home/Common/error", array("该商品不存在"));
            return false;
        }
        // 购物车内产品不存在就添加 存在就数量加1 使用session 保存则无需区分用户,每个用户数据都不同。session 特性
        // $_SESSION[shopcar] 未登录购物车
        if (!array_key_exists($goodid, $_SESSION[shopcar])) {
            $sessionitem = $post;
            $sessionitem[goodsname] = $goodsinfo[goodsname];
            $sessionitem[thumb] = $goodsinfo[thumb];
            $sessionitem[price] = $goodsinfo[price] * $post[num];
            $_SESSION[shopcar][$goodid] = $sessionitem;
        } else {
            // 如果存在就增加数量
            $_SESSION[shopcar][$goodid][num]+=$post[num];
            $_SESSION[shopcar][$goodid][price] = $goodsinfo[price] * $_SESSION[shopcar][$goodid][num];
        }
        R("Home/Common/error", array("商品成功加入购物车"));
        return false;
    }
    /**
     * 用户已经登陆则添加产品到 购物车表
     * @return boolean
     */
    private function addlogin() {
        $userid = $_SESSION[user][id]; // userid 在登录的时候添加到 session
        $goodmodel = M('Goods');
        $goodid = $_POST[goods_id];
        $goodsinfo = $goodmodel->find($goodid);
        if (!$goodsinfo) {
            R("Home/Common/error", array("该商品不存在"));
            return false;
        }
        $shopcarmodel = new ShopcarModel(); // 购物车模型
        $where = "users_id='$userid' and goods_id='$goodid'";
        // 如果产品存在就增加数量
        if ($shopcarmodel->where($where)->find()) {
            $shopcarmodel->num+=$_POST[num];
            $shopcarmodel->price = $goodsinfo[price] * $shopcarmodel->num * $userid = $_SESSION[user][discount] / 100;
            if ($shopcarmodel->save()) {
                R("Home/Common/error", array("商品成功加入购物车"));
                return false;
            } else {
                R("Home/Common/error", array("购物车添加失败"));
                return false;
            }
        // 产品不存在 就添加这个产品
        // $shopcarmodel 共有5个字段:id,num,price,user_id,goods_id
        } else {
            // 补充两个字段，这两个字段没有 post
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
        // 如果购物车session中没有数据则什么都不做。
        if (!is_array($_SESSION[shopcar])) {
            return false;
        }
        // 循环将 session 数据加入用户的购物车表中
        foreach ($_SESSION[shopcar] as $value) {
            $shopcardata = array();
            $shopcardata[num] = $value[num];
            $discount = $_SESSION[user][discount];
            $shopcardata[price] = $value[price] * $discount / 100;
            $shopcardata[users_id] = $_SESSION[user][id];
            $shopcardata[goods_id] = $value[goods_id];
            $shopcarmodel = new ShopcarModel();
            $shopcarmodel->add($shopcardata);
        }
    }

}

?>