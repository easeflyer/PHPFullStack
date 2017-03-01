<?php
    function checkPwd($uPwd){
        if(strlen($uPwd)<8) return false;
        return true;
    }
    
    
    function func1(){
        echo "这是  func1 公共函数的输出!<br /><br />";
    }