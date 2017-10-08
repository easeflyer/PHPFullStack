const fs = require('fs');
const child_process = require('child_process');
var util = require('util');


for(var i=0; i<3; i++) {
   var workerProcess = child_process.spawn('node', ['demo9_support.js', i]);

   //var workerProcess = child_process.spawn('node demo9_support.js');
   // 用于捕获子进程的错误，利用 util.inspect 输出错误信息 util.inspect 专门用于调试输出对象信息
   workerProcess.on('error',function(err){
      console.log(util.inspect(err));
   });

   workerProcess.stdout.on('data', function (data) {
      console.log('stdout: ' + data);
   });

   workerProcess.stderr.on('data', function (data) {
      console.log('stderr: ' + data);
   });

   // close exit 区别？
   workerProcess.on('close', function (code) {
      console.log('子进程已退出，退出码 '+code);
   });
}
