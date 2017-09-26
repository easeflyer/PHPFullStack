/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// EventEmitter 类
var EventEmitter = require('events').EventEmitter; 
// event 对象
var event = new EventEmitter(); 
// 注册事件 some_event
event.on('some_event', function() { 
    console.log('some_event occured.'); 
}); 
// 触发事件
setTimeout(function() { 
    event.emit('some_event'); 
}, 1000); 


/**
 * 说明
 * 运行这段代码，1秒后控制台输出了 'some_event occured'。其原理是 event 对象 注册了事件 some_event 的一个监听器（处理函数），
 * 然后我们通过 setTimeout 在1000毫秒以后向 event 对象发送事件 some_event，此时会调用some_event 的监听器。
 */