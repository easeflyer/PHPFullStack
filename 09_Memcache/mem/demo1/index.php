<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set("session.save_handler", "memcache");  
ini_set("session.save_path", "tcp://127.0.0.1:11211");  
  
  
session_start();  
  
$_SESSION['TEST']="HI";  
  
print "\n";  
print session_id();?>  