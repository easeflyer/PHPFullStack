<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DemoModel
 *
 * @author Administrator
 */
Class DemoModel extends Model {
    Protected $autoCheckFields = false;
    // 这里模拟了一个 Demo 模型的业务逻辑处理函数
    function getPrice(){
        $p1 = "5000";       // 市场价
        $discount = 0.9;    // 销售折扣
        //$vip = 0.8;         // vip 折扣
        $vip = 1;
        $fee = 15;          // 运费
        
        return $p1 * $discount * $vip + $fee;
    }
}