<?php

/**
 * 完成 订购流程
 * 参数:
 *  $_GET[step]; 用于 转向 对应的处理方法 $this->$step();
 */
class ShoppingflowAction extends Action {

    function step() {
        R('Home/Common/header');
        if (!R("Home/User/checkboxlogin")) {
            R("Home/Common/error", array("请先登录", U('User/login')));
            return false;
        }
        $step = $_GET[step]; // shoppingcar 参数
        $steps = array('shoppingcar', 'shoppingaddress', 'createorder', 'shippingtype', 'nextstep', 'payment', 'selfmoney', 'payonline', 'callback');
        // 转向对应的处理方法
        if (in_array($step, $steps)) {
            $this->$step();
            return;
            // 如果不存在对应的处理方法则提示错误。
        } else {
            R("Home/Common/error", array("参数错误"));
            return;
        }
    }

    /**
     * 
     * step 调用 nextstep方法, nextstep 再调用 step 转向 后续操作步骤。 这个方法只是添加了 orderid 有点奇怪,有待改进
     * 
     * 参数:
     *  $nextstep 
     */
    private function nextstep() {
        $nextstep = $_GET[nextstep];
        $orderid = $_GET[orderid];
        $_SESSION[currentorder] = $orderid;
        $this->redirect("Shoppingflow/step", array('step' => $nextstep));
    }

    /**
     * 购物车 处理第一步 点击购物车打开方法
     * 显示购物车 数据。
     * 如果用户未登陆则需要登陆 见 step 方法
     * 用户登陆后,session 中的产品将会被添加到购物车表中,参见登陆方法
     */
    function shoppingcar() {
        $userid = $_SESSION[user][id];
        $shopcarmodel = new ShopcarViewModel(); // 购物车连接产品信息 视图
        $carinfo = $shopcarmodel->where("users_id=$userid")->select();
        $this->assign('carinfo', $carinfo);
        //echo "3333333333333333333";exit;
        $this->display('shoppingcar');
    }

    /**
     * shoppingcar.html 购物车显示页 购物流程第一步 ajax 调用本页
     * 参数:
     *      $num=(int)$_GET[num];       数量
      $carid=(int)$_GET[carid];   购物车id
      $goodid=(int)$_GET[goodid]; 产品id
     * 返回: 产品总价
     */
    function changegoodnum() {
        // 判断 $_SESSION[user] 是否存在,如果没有登陆则 echo 0  ?? 没有登陆本方法不会调用
        if (!R("Home/User/checkboxlogin")) {
            echo 0;
            return;  //ease: 添加 return 不然会有没登录时总价错误的问题。
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
        $shopcarmodel->price = $newprice; //总价
        if ($shopcarmodel->save()) { // 保存购物车数据
            echo $newprice;
        } else {
            echo 0;
        }
    }

    /**
     * 移除商品
     * 购物车显示页 订购流程第一步
     * 点击移除商品 转到本方法
     * @return boolean
     */
    function delcargoods() {
        if (!R("Home/User/checkboxlogin")) {
            R("Home/Common/error", array("请先登录", U('User/login')));
            return false;
        }
        $carid = (int) $_GET[carid];
        $shopcarmodel = M('Shopcar');
        if ($shopcarmodel->delete($carid)) {
            R("Home/Common/error", array("删除成功", U('Shoppingflow/step', array('step' => 'shoppingcar'))));
        } else {
            R("Home/Common/error", array("删除失败"));
        }
    }

    /**
     * 选择 收货地址
     * 修改订单 ordermodel[address_id] 然后保存
     * @return boolean
     */
    private function shoppingaddress() {
        // 从本方法的视图 提交数据
        if ($_POST) {
            $ordermodel = M('Orders');
            $addessid = (int) $_POST[addressid];
            if (!$addessid) {
                R("Home/Common/error", array("请选择收货地址"));
                return false;
            }
            $savedata = array();
            $orderid = $_SESSION[currentorder]; // 获取 order_id nextstep方法 可以获得
            $savedata[address_id] = $addessid;  // 添加送货地址
            $savedata[nextstep] = 'shippingtype'; // nextstep:物流方式
            if (!$ordermodel->where("id='$orderid'")->save($savedata)) {
                R("Home/Common/error", array("收货地址错误请重新选取"));
                return;
            }
            //这里为什么要提交事务?? 没有开启事务为什么要提交。
            //$ordermodel->commit(); // 经过尝试 注销本句 好像没有影响。
            $this->redirect("Shoppingflow/step", array('step' => 'shippingtype'));
            // 无$_POST 参数 则显示 shoppingaddress.html 模板,显示用户的所有收货地址
            // 从用户中心点击 继续操作时 会传递 $_GET['order_id'] 参见 nextstep 方法,同时添加了 $_SESSION[currentorder];
        } else {
            $userid = $_SESSION[user][id];
            $addressmodel = new AddressModel();
            $addressdata = $addressmodel->where("users_id='$userid'")->select();
            $this->assign("addressdata", $addressdata);
            $this->display("shoppingaddress");
        }
    }

    function test() {
        echo "test<hr />";
        print_r(session('ease_data'));
    }

    /**
     * 购物车显示页 点击下一步 转到本方法
     * 本方法首先创建订单,然后进入下一步  shoppingaddress
     * @return boolean 执行失败返回false 成功则跳转到下一步:shoppingaddress,无其他参数传递
     */
    private function createorder() {
        //在订单表中插入订单信息
        $ordermodel = M('Orders');
        $ordermodel->startTrans(); // 开启事务
        $ordergoodsmodel = M("Ordergoods");
        $shopcar = new ShopcarViewModel(); // 购物车连接产品表 视图
        $userid = $_SESSION[user][id];
        $data = array();
        $data[users_id] = $userid;
        $data[ordertime] = time();
        //time() 秒数,rand(1000, 9999) 返回1000-9999的随机数 一秒9999个随机数保证了订单编码的唯一
        // 假设淘宝 这个算法显然是不可取的。 一秒1万人下单 是可能的
        $data[ordersn] = 'wysc_' . time() . rand(1000, 9999);
        // 创建订单
        if (!$ordermodel->add($data)) {
            $ordermodel->rollback();    // 如果订单创建失败 则回滚
            return;
        }
        //session('ease_data',$data); 
        $orderid = $ordermodel->getLastInsID(); //返回最后插入的  id
        $goodsdata = $shopcar->where("users_id='$userid'")->select(); //用户购物车数据
        $totalprice = 0;
        //循环添加 所有购物车产品添加到购物车产品表 只有生成了订单,才能添加产品
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

                $ordermodel->rollback();    // 如果订单产品添加失败 则回滚
                return false;
            }
        }
        // 清空购物车 订单产品都添加后 就可以清空购物车了。
        $shopcarmodel = M('Shopcar');
        if (!$shopcarmodel->where("users_id='$userid'")->delete()) {

            $ordermodel->rollback();
            return;
        }
        // 只有添加了产品才能计算出总金额 因此最后还需要再更新订单信息。
        $_SESSION[currentorder] = $orderid;  // 用途:后续步骤中(比如shoppingaddress方法) orderid 还会使用在此记录避免查询数据库
        $savedata[nextstep] = 'shoppingaddress';
        $savedata[totalprice] = $totalprice;

        if (!$ordermodel->where("id='$orderid'")->save($savedata)) {
            $ordermodel->rollback();
            return;
        }
        // 如果订单创建成功了 则转向 添加收货地址步骤
        $ordermodel->commit();
        $this->redirect("Shoppingflow/step", array('step' => 'shoppingaddress'));
    }

    private function shippingtype() {
        $shiptypemodel = new Model('Shippingtype');
        if ($_POST) {

            $shippingtype_id = $_POST[shippingtype_id]; // 物流方式 id
            $ordermodel = M('Orders');
            $ordermodel->find($_SESSION[currentorder]);
            $shiptypemodel->find($shippingtype_id);     // 物流方式 对象
            $shipid = $ordermodel->shippingtype_id;     // 调取判断物流方式是否已经设置

            if ($shipid != 0) {
                R("Home/Common/error", array("已经选择配送方式,不能重复选取")); //ease:原来本句注释掉了
                return false;
            }
            $ordermodel->shippingtype_id = $shippingtype_id;
            //$ordermodel->shipmoney = $shiptypemodel;  原语句
            $ordermodel->shipmoney = $shiptypemodel->extramoney;
            $ordermodel->nextstep = 'payment'; // 下一步是:payment 支付方式
            $ordermodel->orderstate_id = '4';  // 物流方式 选定后,订单转为 确认状态  ??这里为什么是 4
            // 订单状态:1 未确认;2 已付款;3 已发货; 4 已确认; 5 插销订单
            if ($ordermodel->save()) {
                $this->redirect("Shoppingflow/step", array('step' => 'payment'));
            } else {
                R("Home/Common/error", array("配送方式选择失败"));
                return false;
            }
            // 没有提交的时候 显示选择 物流方式的视图
        } else {

            $data = $shiptypemodel->select();
            $this->assign('data', $data);
            $this->display('shippingtype');
        }
    }

    /**
     * 选择 支付方式
     * 参数:
     *  $_POST['paymenttype']; 支付方式 1 余额 2 易宝支付
     * @return boolean
     */
    private function payment() {
        // 余额支付则 转 selfmoney方法
        // 易宝支付 需要 保存订单状态$ordermodel->nextstep = 'payonline'; 然后转 payonline 方法
        if ($_POST) {
            $payments = array(1, 2);
            $paymenttype = (int) $_POST['paymenttype'];
            if (!in_array($paymenttype, $payments)) {
                R("Home/Common/error", array("非法的支付方式"));
                return false;
            }
            // 余额支付
            if ($paymenttype == 1) {
                $this->redirect("Shoppingflow/step", array('step' => 'selfmoney'));
                return;
            }
            // 易宝支付 payonline
            if ($paymenttype == 2) {
                $ordermodel = M('Orders');
                $ordermodel->find($_SESSION[currentorder]);
                $ordermodel->nextstep = 'payonline';
                $ordermodel->save();
                // 跳转到 易宝支付
                $this->redirect("Shoppingflow/step", array('step' => 'payonline'));
                return;
            }
        } else {
            $this->display('selectpayment');
        }
    }

    /**
     * 易宝支付 过程??未看完
     * 
     * 首先显示 选择支付银行 列表视图
     * 提交 $_POST['pd_FrpId']; 银行代码
     */
    function payonline() {
        $ordermodel = M('Orders');
        $data = $ordermodel->find($_SESSION[currentorder]);
        if ($_POST) {
            $p0_Cmd = 'Buy';
            $p1_MerId = C('p1_MerId');
            $p2_Order = $data['ordersn'];
            $p3_Amt = $data['totalprice'];
            $p4_Cur = 'CNY';
            // 回调地址 ease:应该是同步通知地址.同步通知异步通知都是相同的地址。
            $p8_Url = 'http://127.0.0.1' . U('Shoppingflow/step', array('step' => 'callback'));
            $pd_FrpId = $_POST['pd_FrpId']; // 支付银行的 编码
            $str = '';
            $str.=$p0_Cmd;
            $str.=$p1_MerId;
            $str.=$p2_Order;
            $str.=$p3_Amt;
            $str.=$p4_Cur;
            $str.=$p8_Url;
            $str.=$pd_FrpId;
            $hmac = $this->HmacMd5($str, C('key'));
            $this->assign('p0_Cmd', $p0_Cmd);
            $this->assign('p1_MerId', $p1_MerId);
            $this->assign('p2_Order', $p2_Order);
            $this->assign('p3_Amt', $p3_Amt);
            $this->assign('p4_Cur', $p4_Cur);
            $this->assign('p8_Url', $p8_Url);
            $this->assign('pd_FrpId', $pd_FrpId);
            $this->assign('hmac', $hmac);
            $this->assign('posturl', C('pay_url'));
            $this->display('paypost');
        } else {
            $this->assign('data', $data); // 订单对象
            $this->display('payonline'); // 选择银行
        }
    }

    /**
     * 貌似这个是 支付操作完成后的回调地址。
     * 易宝支付会 采用两种方式访问此页面。
     * 1 浏览器跳转 2 服务器之间直接访问。 根据 r9_BType 参数
     * 
     * 貌似这个函数没有对 支付服务器 点对点通知进行处理。应该是同步通知,通知支付操作完毕,异步通知,处理订单状态。然后发送success
     * @return type
     */
    function callback() {
        $p1_MerId = C('p1_MerId');  // 视频中忘记了这个参数。 hmac 不一致
        $r0_Cmd = $_REQUEST['r0_Cmd'];
        $r1_Code = $_REQUEST['r1_Code'];
        $r2_TrxId = $_REQUEST['r2_TrxId'];
        $r3_Amt = $_REQUEST['r3_Amt'];
        $r4_Cur = $_REQUEST['r4_Cur'];
        $r5_Pid = $_REQUEST['r5_Pid'];
        $r6_Order = $_REQUEST['r6_Order'];
        $r7_Uid = $_REQUEST['r7_Uid'];
        $r8_MP = $_REQUEST['r8_MP'];
        $r9_BType = $_REQUEST['r9_BType'];
        $hmac = $_REQUEST['hmac'];
        #取得加密前的字符串
        $sbOld = "";
        #加入商家ID
        $sbOld = $sbOld . $p1_MerId;
        #加入消息类型
        $sbOld = $sbOld . $r0_Cmd;
        #加入业务返回码
        $sbOld = $sbOld . $r1_Code;
        #加入交易ID
        $sbOld = $sbOld . $r2_TrxId;
        #加入交易金额
        $sbOld = $sbOld . $r3_Amt;
        #加入货币单位
        $sbOld = $sbOld . $r4_Cur;
        #加入产品Id
        $sbOld = $sbOld . $r5_Pid;
        #加入订单ID
        $sbOld = $sbOld . $r6_Order;
        #加入用户ID
        $sbOld = $sbOld . $r7_Uid;
        #加入商家扩展信息
        $sbOld = $sbOld . $r8_MP;
        #加入交易结果返回类型
        $sbOld = $sbOld . $r9_BType;

        $hmac1 = $this->HmacMd5($sbOld, C('key'));


        if ($hmac1 == $hmac) {
            // ease: 这里忘记对 r1_Code 进行判断 参考 易宝支付给出 callback.php
            $orderid = $_SESSION[currentorder];
            $singleordermodel = M('Orders');
            $singleordermodel->find($orderid);
            //判断订单状态是否为已支付
            if ($singleordermodel->orderstate_id == 2) {
                R("Home/Common/error", array("该订单已被支付", U('Index/index')));
                return;
            }
            $ordermodel = new OrderViewModel();
            $orderdata = $ordermodel->find($orderid);
            $totalprice = $orderdata[totalprice] + $orderdata[extramoney];
            //查询用户余额  ease：下面没有查询用户余额 这是易宝支付流程，不需要用户余额
            $usermodel = new UsersModel();
            $userid = $_SESSION[user][id];
            $userdata = $usermodel->find($userid);
            $goodsmodel = M('Goods');
            $goodsmodel->startTrans(); // 开启事务处理
            $ordergoodsmodel = M('Ordergoods');
            $goodsinfo = $ordergoodsmodel->where("orders_id=$orderid")->select();
            //减少库存
            foreach ($goodsinfo as $good) {
                $goodid = $good[goods_id];
                $goodsmodel->find($goodid);
                $goodsmodel->storenum-=$good[num];

                if (!$goodsmodel->save()) {
                    $goodsmodel->rollback();
                    R("Home/Common/error", array("在线支付失败1", U('Index/index')));
                    return;
                }
            }
            //减少用户对应余额,并增加用户积分

            $usermodel->points+=ceil($totalprice / 10);
            if (!$usermodel->save()) {
                $goodsmodel->rollback();
                R("Home/Common/error", array("在线支付失败2", U('Index/index')));
                return;
            }
            // 置订单状态
            $singleordermodel->orderstate_id = 2;
            if (!$singleordermodel->save()) {

                $goodsmodel->rollback();
                R("Home/Common/error", array("在线支付失败3", U('Index/index')));
                return;
            }
            //将用户金额变化明细存储到相关表当中 ease： 没有涉及余额变化，按照当前的逻辑，不需要记录。

            $usermodel->commit();
            R("Home/Common/error", array("在线支付成功", U('Index/index')));
        } else {
            echo "error";
        }
    }
    /** 
     *  用于测试 异步通知方法
     * @param type $msg
     */
    function writeBtype($msg) {
        $myfile = fopen("btype.txt", "w") or die("Unable to open file!");
        $txt = "Bill Gates\n";
        fwrite($myfile, $txt);
        $txt = "Steve Jobs\n".$msg;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    private function HmacMd5($data, $key) {
        // RFC 2104 HMAC implementation for php.
        // Creates an md5 HMAC.
        // Eliminates the need to install mhash to compute a HMAC
        // Hacked by Lance Rushing(NOTE: Hacked means written)
        //需要配置环境支持iconv，否则中文参数不能正常处理
        $key = iconv("GBK", "UTF-8", $key);
        $data = iconv("GBK", "UTF-8", $data);
        $b = 64; // byte length for md5
        if (strlen($key) > $b) {
            $key = pack("H*", md5($key));
        }
        $key = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad . pack("H*", md5($k_ipad . $data)));
    }

    /**
     * 余额支付流程
     * 1、商品的对应库存剪掉
     * 2、用户余额应该减掉响应的金额
     * 3、用户积分应该对应增加
     * 4、订单状态需要发生变化
     * 5、用户金额的变化明细
     * 6、使用事务机制处理上述操作
     * 
     * 余额支付流程已读ease
     */
    private function selfmoney() {
        //计算订单金额 包含物流费用
        $orderid = $_SESSION[currentorder];
        $ordermodel = new OrderViewModel(); // 订单信息 + 订单状态 + 物流信息 + 用户信息  视图
        $orderdata = $ordermodel->find($orderid);
        $totalprice = $orderdata[totalprice] + $orderdata[extramoney];  // 订单总额 + 物流费用
        //查询用户余额
        $usermodel = new UsersModel();
        $userid = $_SESSION[user][id];
        $userdata = $usermodel->find($userid);
        $oldmoney = (int) $userdata[usermoney];
        $usermoney = (int) $userdata[usermoney];
        if ($usermoney < $totalprice) {
            R("Home/Common/error", array("用户余额不足，请选择其他支付方式", U('Shoppingflow/step', array('step' => 'payment'))));
            //ease: 增加 return 否则后续代码还是会被执行
            return;
        }
        $goodsmodel = M('Goods');
        // 开启事务
        $goodsmodel->startTrans();
        $ordergoodsmodel = M('Ordergoods');
        $goodsinfo = $ordergoodsmodel->where("orders_id=$orderid")->select();
        //减少库存 数量从 订单商品的数量获得
        foreach ($goodsinfo as $good) {
            $goodid = $good[goods_id];
            $goodsmodel->find($goodid);
            $goodsmodel->storenum-=$good[num];
            if ($goodsmodel->storenum < 0) {
                $goodsmodel->rollback();
                R("Home/Common/error", array("商品库存不足,请稍后在进行订单支付", U('Shoppingflow/step', array('step' => 'payment'))));
                //ease: 增加 return;
                return;
            }
            if (!$goodsmodel->save()) {
                $goodsmodel->rollback();
                R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
                return;
            }
        }
        //减少用户对应余额,并增加用户积分
        $usermodel->usermoney-=$totalprice;
        $newmoney = $usermodel->usermoney; // 支付后用户余额
        $usermodel->points+=ceil($totalprice / 10);
        if (!$usermodel->save()) {
            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        // 更新订单状态为 2 已支付
        $singleordermodel = M('Orders');
        $singleordermodel->find($orderid);
        $singleordermodel->orderstate_id = 2;
        if (!$singleordermodel->save()) {

            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        //将用户金额变化明细存储到相关表当中
        $info = "订单【" . $orderid . "】消费" . $totalprice . '元';
        $moneydetaildata = array();
        $moneydetaildata[users_id] = $userid;
        $moneydetaildata[oldmoney] = $oldmoney; // 支付前 用户余额
        $moneydetaildata[newmoney] = $newmoney; //支付后用户余额
        $moneydetaildata[info] = $info;
        $moneydetailmodel = M('Moneydetail');
        if (!$moneydetailmodel->add($moneydetaildata)) {
            $goodsmodel->rollback();
            R("Home/Common/error", array("在线支付失败", U('Shoppingflow/step', array('step' => 'payment'))));
            return;
        }
        $usermodel->commit();
        R("Home/Common/error", array("在线支付成功", U('Index/index')));
    }

}

?>
