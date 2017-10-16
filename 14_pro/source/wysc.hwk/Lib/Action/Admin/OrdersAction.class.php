<?php

class OrdersAction extends CommonAction {

    function manage() {
        $page = (int) $_GET[page];
        $ordermodel = new OrderViewModel();
        $total = $ordermodel->count();
        $totalpage = ceil($total / C('PAGE_SIZE'));
        $page = max(1, $page);
        $page = min($totalpage, $page);
        $data = $ordermodel->page($page, C('PAGE_SIZE'))->select();
        //print_r($data);
        $this->assign('data', $data);
        $this->assign('total', $total);
        $this->assign('page', $page);
        $this->display();
    }

    function detail() {
        //订单的基本信息
        $orderid = $_GET[orderid];
        $ordermodel = new OrderViewModel();
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

    function editorderstate() {
        $ordermodel = M('Orders');
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
        } else {
            $orderid = $_POST[orders_id];
            $data[info] = $_POST[info];
            $data[orders_id] = $orderid;
            $orderdata = $ordermodel->find($orderid);
            $data[fromstate] = $orderdata[orderstate_id];
            $data[tostate] = $_POST[orderstate_id];
            $data[changetime] = time();
            $orderchangemodel = M('Orderchangedetail');
            if ($orderchangemodel->add($data)) {
                $this->success("订单状态修改成功");
            } else {
                //echo $orderchangemodel->getlastsql();
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