/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var events = require('events'); 
var emitter = new events.EventEmitter(); 


// 如果没有对 error 设置侦听器（处理函数），则会向外（运行环境意外）抛出错误！
emitter.on('error',function(){
    console.log("这里捕获了error 事件，可以做出合理的处理！");
});
emitter.emit('error'); 