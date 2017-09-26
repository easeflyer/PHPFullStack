/* 
 * nodejs 中的 events 非 js 中的event
 * 流程：
 * 1 var eventEmitter = new events.EventEmitter(); 生成事件处理对象
 * 2 eventEmitter.on('connection', functionname); 注册事件
 * 3 eventEmitter.emit('connection') 触发事件
 * 
 */


// 引入 events 模块
var events = require('events');
// 创建 eventEmitter 对象,  可以理解为事件管理者，事件发出者
var eventEmitter = new events.EventEmitter();

// 创建事件处理程序,
// 注意按照 js 语法这里 connected 函数名可以省略。
var connectHandler = function connected() {
   console.log('连接成功。');
  
   // 连接处理完成后， 触发 data_received 事件，数据接收事件 
   eventEmitter.emit('data_received');
}

// 绑定 connection 事件处理程序，注册事件。
eventEmitter.on('connection', connectHandler);
 
// 使用匿名函数绑定 data_received 事件
eventEmitter.on('data_received', function(){
   console.log('数据接收成功。');
});

// emit 触发 connection 事件 
eventEmitter.emit('connection');

console.log("程序执行完毕。");