<?php

class ShoppingflowAction extends Action {

    function step() {
        R('Home/Common/header');
        if (!R("Home/User/checkboxlogin")) {
            R("Home/Common/error", array("请先登录", U('User/login')));
            return false;
        }
        $step = $_GET[step];
        $steps = array('shoppingcar', 'shoppingaddress', 'createorder', 'shippingtype', 'nextstep', 'payment', 'selfmoney', 'payonline');
        if (in_array($step, $steps)) {
            $this->$step();
            return;
        } else {
            R("Home/Common/error", array("参数错误"));
            return;
        }
    }

    private function nextstep() {
        $nextstep = $_GET[nextstep];
        $orderid = $_GET[orderid];
        $_SESSION[currentorder] = $orderid;
        $this->redirect("Shoppingflow/step", array('step' => $nextstep));
    }

    function shoppingcar() {
        $userid = $_SESSION[user][id];
        $shopcarmodel = new ShopcarViewModel();
        $carinfo = $shopcarmodel->where("users_id=$userid")->select();
        //echo $shopcarmodel->getlastsql();
        //print_r($carinfo);
        $this->assign('carinfo', $carinfo);
        $this->display('shoppingcar');
    }

    function changegoodnum() {
        if (!R("Home/User/checkboxlogin")) {
            echo 0;
        }
        $num = (int) $_GET[num];
        $carid = (int) $_GET[carid];
        $goodid = (int) $_GET[goodid];
        $goodmodel = M('Goods');
        $goodmodel->find($goodid);
        $goodprice = $goodmodel->price;
        $shopcarmodel = M('Shopcar');
        $shopcarmodel->find($carid);
        $shopcarmodel->num = $num;
        $newprice = $goodprice * $_SESSION[user][discount] * $num / 100;
        $shopcarmodel->price = $newprice;
        if ($shopcarmodel->save()) {
            echo $newprice;
        } else {
            echo 0;
        }
    }

    function delcargoods() {
        if (!R("Home/User/checkboxlogin")) {
            R("Home/Common/error", array("请先登录", U('User/login')));
            return false;
        }
        $carid = (int) $_GET[carid];
        $shopcarmodel = M('Shopcar');
        if ($shopcarmodel->delete($carid)) {
            R("Home/Common/error", array("移除成功", U('Shoppingflow/step', array('step' => 'shoppingcar'))));
        } else {
            R("Home/Common/error", array("移除失败"));
        }
    }

    private function shoppingaddress() {
        if ($_POST) {
            //print_r($_POST);
            $ordermodel = M('Orders');
            $addessid = (int) $_POST[addressid];
            if (!$addessid) {
                R("Home/Common/error", array("请选择收货地址"));
                return false;
            }
            $savedata = array();
            $orderid = $_SESSION[currentorder];
            $savedata[address_id] = $addessid;
            $savedata[nextstep] = 'shippingtype';
            if (!$ordermodel->where("id='$orderid'")->save($savedata)) {
                R("Home/Common/error", array("收货地址错误请重新选取"));
                return;
            }
            $ordermodel->commit();
            $this->redirect("Shoppingflow/step", array('step' => 'shippingtype'));
        } else {
            $userid = $_SESSION[user][id];
            $addressmodel = new AddressModel();
            $addressdata = $addressmodel->where("users_id='$userid'")->select();
            $this->assign("addressdata", $addressdata);
            $this->display("shoppingaddress");
        }
    }

    private function createorder() {
        //在订单表中插入订单信息
        $ordermodel = M('Orders');
        $ordermodel->startTrans();
        $ordergoodsmodel = M("Ordergoods");
        $shopcar = new ShopcarViewModel();
        $userid = $_SESSION[user][id];
        $data = array();
        $data[users_id] = $userid;
        $data[ordertime] = time();
        //$data[ordersn] = 'wysc_' . time() . rand(1000, 9999);
        if (!$ordermodel->add($data)) {
            //echo $ordermodel->getlastsql();
            //数据库默认值为1，没有了默认值对应的数据
            $ordermodel->rollback();
            return;
        }
        $orderid = $ordermodel->getLastInsID();
        $goodsdata = $shopcar->where("Users_id='$userid'")->select();
        $totalprice = 0;
        foreach ($goodsdata as $value) {
            $ordergoodsdata = array();
            $ordergoodsdata[orders_id] = $orderid;
            $ordergoodsdata[goods_id] = $value[goods_id];
            $ordergoodsdata[goods_name] = $value[goodsname];
            $ordergoodsdata[num] = $value[num];
            $ordergoodsdata[goods_mprice] = $value[goods_mprice];
            $ordergoodsdata[goods_price] = $value[goods_price];
            $ordergoodsdata[totalprice] = $value[price];
            $ordergoodsdata[goods_thumb] = $value[thumb];
            $ordergoodsdata[discount] = $_SESSION[user][discount];
            $totalprice+=$value[price];
            if (!$ordergoodsmodel->add($ordergoodsdata)) {
                //echo $ordergoodsmodel->getlastsql();
                $ordermodel->rollback();
                return false;
            }
        }
        $shopcarmodel = M('Shopcar');
        if (!$shopcarmodel->where("users_id='$userid'")->delete()) {
            $ordermodel->rollback();
            return;
        }
        $_SESSION[currentorder] = $orderid;
        $savedata[nextstep] = 'shoppingaddress';
        $savedata[totalprice] = $totalprice;
        if (!$ordermodel->where("id='$orderid'")->save($savedata)) {
            $ordermodel->rollback();
            return;
        }
        $ordermodel->commit();
        $this->redirect("Shoppingflow/step", array('step' => 'shoppingaddress'));
    }

    private function shippingtype() {
        $shiptypemodel = new Model('Shippingtype');
        if ($_POST) {
            $shippingtype_id = $_POST[shippingtype_id];
            $ordermodel = M('Orders');
            $ordermodel->find($_SESSION[currentorder]);
            $shiptypemodel->find($shippingtype_id);
            $shipid = $ordermodel->shippingtype_id;
            if ($shipid != 0) {
                R("Home/Common/error", array("已经选择配送方式,不能重复选取"));
                return false;
            }
            $ordermodel->shippingtype_id = $shippingtype_id;
            $ordermodel->shipmoney = json_encode($shiptypemodel); //3.1版
            $ordermodel->nextstep = 'payment';
            $ordermodel->orderstate_id = '2';
            if ($ordermodel->save()) {
                $this->redirect("Shoppingflow/step", array('step' => 'payment'));
            } else {
                R("Home/Common/error", array("配送方式选择失败"));
                return false;
            }
        } else {
            $data = $shiptypemodel->select();
            $this->assign('data', $data);
            $this->display('shippingtype');
        }
    }

    private function payment() {
        if ($_POST) {
            $payments = array(1, 2);
            $paymenttype = (int) $_POST['paymenttype'];
            if (!in_array($paymenttype, $payments)) {
                R("Home/Common/error", array("非法的支付方式"));
                return false;
            }
            if ($paymenttype == 1) {
                $this->redirect("Shoppingflow/step", array('step' => 'selfmoney'));
                return;
            }
            if ($paymenttype == 2) {
                $ordermodel = M('Orders');
                $ordermodel->find($_SESSION[currentorder]);
                $ordermodel->nextstep = 'payonline';
                $ordermodel->save();
                $this->redirect("Shoppingflow/step", array('step' => 'payonline'));
                return;
            }
        } else {
            $this->display('selectpayment');
        }
    }

    /*
     * 余额支付
     * 1.商品的对应库存减掉
     * 2.用户的余额应该减掉相应的金额
     * 3用户的积分应该增加
     * 4.订单状态发生变化
     * 5.用户金额的变化明细
     * 6.使用事务机制处理上述操作
     */

    private function selfmoney() {
        //计算订单的金额
        $orderid = $_SESSION[currentorder];
        $ordermodel = new OrderViewModel();
        $orderdata = $ordermodel->find($orderid);
        //print_r($orderdata);
        $totalprice = $orderdata[totalprice] + $orderdata[extramoney];
        //echo $totalprice;
        //查询用户余额
        $usermodel = new UsersModel();
        $userid = $_SESSION[user][id];
        $userdata = $usermodel->find($userid);
        $oldmoney = (int) $userdata[usermoney];
        $usermoney = (int) $userdata[usermoney];
        //echo $usermoney;
        if ($usermoney < $totalprice) {
            R("Home/Common/error", array("用户余额不足，请选择其他支付方式", U('Shoppingflow/step', array('step' => 'payment'))));
        }
        $goodsmodel = M('Goods');
        $goodsmodel->startTrans();
        $ordergoodsmodel = M('Ordergoods');
        $goodsinfo = $ordergoodsmodel->where("orders_id=$orderid")->select();
        //减少库存
        foreach ($goodsinfo as $good) {
            $goodid = $good[goods_id];
            $goodsmodel->find($goodid);
            $goodsmodel->storenum-=$good[num];
            if ($goodsmodel->storenum < 0) {
                $goodsmodel->rollback();
                R("Home/Common/error", array("商品库存不足,请稍后在进行订单支付", U('Shoppingflow/step', array('step' => 'payment'))));
            }
            if (!$goodsmodel->save()) {
                $goodsmodel->rollback();
                R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
                return;
            }
        }
        //减少用户对应余额,并增加用户积分
        $usermodel->usermoney-=$totalprice;
        $newmoney = $usermodel->usermoney;
        $usermodel->points+=ceil($totalprice / 10);
        if (!$usermodel->save()) {
            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        $singleordermodel = M('Orders');
        $singleordermodel->find($orderid);
        $singleordermodel->orderstate_id = 3;
        if (!$singleordermodel->save()) {
            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        //将用户金额变化明细存储到相关表当中
        $info = "订单【" . $orderid . "】消费" . $totalprice . '元';
        $moneydetaildata = array();
        $moneydetaildata[users_id] = $userid;
        $moneydetaildata[oldmoney] = $oldmoney;
        $moneydetaildata[newmoney] = $newmoney;
        $moneydetaildata[info] = $info;
        $moneydetailmodel = M('Moneydetail');
        if (!$moneydetailmodel->add($moneydetaildata)) {
            //echo $moneydetailmodel->getlastsql();
            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        $ordermodel->commit();
        R("Home/Common/error", array("在线支付成功", U('Index/index')));
    }

}

?>