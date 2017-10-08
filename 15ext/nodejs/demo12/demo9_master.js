/**
 * node 多进程实例
 * require('child_process'); 模块负责管理子进程
 * 
 */


 const fs = require('fs');
 const child_process = require('child_process');
var util = require("util");

 for(var i=0; i<3; i++) {
   // 开启一个子进程 i 是 demo9_support.js 的参数 用于标识进程号
   // exec 第二个参数可选，并且是一个对象
   var workerProcess = child_process.exec('node demo9_support.js '+i,
      function (error, stdout, stderr) {
         
         if (error) {
            console.log(error.stack);
            console.log('Error code: '+error.code);
            console.log('Signal received: '+error.signal);
         }
         console.log('stdout: ' + stdout); // stdout 就是子进程的输出 console.log
         console.log('stderr: ' + stderr);
      }
   );
   // exit 的注释：http://nodejs.cn/api/child_process.html#child_process_event_exit  查看 child_process 子进程
   workerProcess.on('exit', function (code) {
      // this 就是触发事件的对象，因此就是子进程
      console.log('['+this.pid+']子进程已退出，退出码 '+code); // 注意这里 i = 3 原因是这是回调函数，触发时，以上循环已经执非阻塞的行完毕。 可以用 util.inspect(this) 输出当前进程
   });
}