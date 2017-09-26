/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



// 定义了一个 Hello 类
function Hello() { 
    var name; 
    this.setName = function(thyName) { 
        name = thyName; 
    }; 
    this.sayHello = function() { 
        console.log('Hello ' + name); 
    }; 
}; 

/**
 * 把 Hello 类赋值给了 exports   这个需要理解下语法
 * 
 * exports 是模块对外开放的对象。 require 引入模块时，实际上就是引入了 exports 对象。
 * 因此 require 本模块后。得到的就是 Hello 类
 * 
 * 如果 exports.world = function(){} 方式。
 * 则 require 获得的仍然是 exports 对象，这个对象有一个 world 方法。见main.js
 */
module.exports = Hello