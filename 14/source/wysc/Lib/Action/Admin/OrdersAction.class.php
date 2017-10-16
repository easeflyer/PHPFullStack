<?php

class OrdersAction extends CommonAction {
    /**
     *  管理订单：订单列表
     */
    function manage() {
        $page = (int) $_GET[page];
        $ordermodel = new OrderViewModel(); // 连接 orderstate订单状态，shippingtype物流方式，users用户信息
        $total = $ordermodel->count(); // 总数据条数
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = max(1, $page);
        $page = min($totalpage, $page);
        $data = $ordermodel->page($page, C('PAGE_SIZE'))->select();
        $this->assign('data', $data); // 订单数据集
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }
    /**
     *  管理订单列表 点击 查看订单详情 调用本方法
     */
    function detail() {
        //订单的基本信息
        $orderid = $_GET[orderid];
        $ordermodel = new OrderViewModel(); //  连接 orderstate订单状态，shippingtype物流方式，users用户信息，
        $basicorderdata = $ordermodel->find($orderid);
        $this->assign('basicorderdata', $basicorderdata);
        //地址信息
        $addressmodel = M('Address');
        $addressid = $basicorderdata['address_id'];
        $addressdata = $addressmodel->find($addressid);
        $this->assign('addressdata', $addressdata);
        //商品信息
        $ordergoodsmodel = M('Ordergoods');
        $goodsdata = $ordergoodsmodel->where("orders_id='$orderid'")->select();
        $this->assign('goodsdata', $goodsdata);
        $this->display();
    }
    /**
     *  管理订单列表 点击修改订单状态 调用本方法
     *  
     */
    function editorderstate() {
        $ordermodel = M('Orders');
        // 如果没有 提交 则显示修改状态表单
        if (!$_POST) {
            $orderid = $_GET[orderid];

            $orderdata = $ordermodel->find($orderid);
            $stateid = $orderdata['orderstate_id'];
            $this->assign('stateid', $stateid);
            $statemodel = M('Orderstate');
            $statedata = $statemodel->select();
            $this->assign('statedata', $statedata);
            $this->assign('orderid', $orderid);
            $this->display();
        // 否则如果有POST 则修改订单状态
        } else {

            $orderid = $_POST[orders_id];
            $data[info] = $_POST[info];
            $data[orders_id] = $orderid;
            $orderdata = $ordermodel->find($orderid);
            //ease: 这里忘记修改 order 的订单状态了。只是保存了修改记录。
            $ordermodel->orderstate_id = $_POST[orderstate_id];
            
            $data[fromstate] = $orderdata[orderstate_id];
            $data[tostate] = $_POST[orderstate_id];
            $data[changetime] = time();
            $orderchangemodel = M('Orderchangedetail');
            if ( $orderchangemodel->add($data)  &&  $ordermodel->save() ) {
                $this->success("订单状态修改成功",U("manage"));
            } else {
                $this->error("订单状态修改失败");
            }
        }
    }

    function statechangedetail() {
        $orderid = $_GET[orderid];
        $statedetail = new StatedetailViewModel();
        $data = $statedetail->where("orders_id='$orderid'")->select();

        $statemodel = M('Orderstate');
        $data1 = array();
        foreach ($data as $val) {
            $statedata = $statemodel->find($val[tostate]);
            $val[tstate] = $statedata[state];
            $data1[] = $val;
        }
        $this->assign('data', $data1);
        $this->display();
    }

}

?>