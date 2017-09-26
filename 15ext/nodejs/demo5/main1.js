/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Node.js 提供了exports 和 require 两个对象，其中 exports 是模块公开的接口，
 * require 用于从外部获取一个模块的接口，即所获取模块的 exports 对象。
 * 
 */

var Hello = require('./hello1'); 
hello = new Hello(); 
hello.setName('BYVoid'); 
hello.sayHello(); 