<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TestModel extends Model{
    public $v1 =1;
    public $v2 =2;
    public $v3 ="aaa";
    Public $demo = "这是 demo 属性";
    
    public function at(){
        return "这是 at 方法 <br />";
    }
    function demo(){
        echo "这是 demo 方法";
    }
}