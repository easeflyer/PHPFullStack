/* 
 * 给 someEvent 事件 注册两个回调函数（侦听器）
 * 触发 someEvent 事件时，将会依次执行两个侦听器
 */


//event.js 文件
var events = require('events'); 
var emitter = new events.EventEmitter(); 

// 添加新的监听器时 newListener 事件被触发
emitter.on('newListener',function(arg1){
    console.log('newListener add!',arg1);
});
// 当有监听器被移除时触发
emitter.on('removeListener',function(arg1){
    console.log('Listener remove!!',arg1);
});

// 下面给 someEvent 事件绑定三个 监听器
emitter.on('someEvent', function fun1(arg1, arg2) { 
    console.log('listener1', arg1, arg2,"333"); 
}); 
emitter.on('someEvent', function fun2(arg1, arg2) { 
    console.log('listener2', arg1, arg2); 
}); 

var fun3 = function (arg1,arg2){
    console.log('listener3', arg1, arg2);
}
emitter.on('someEvent', fun3); 



emitter.emit('someEvent', 'arg1 参数', 'arg2 参数'); 
// 移除一个监听器
emitter.removeListener('someEvent',fun3);
emitter.emit('someEvent', 'arg1 参数', 'arg2 参数'); 