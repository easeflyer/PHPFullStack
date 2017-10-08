const fs = require('fs');
const child_process = require('child_process');
 
for(var i=0; i<3; i++) {
	// fork 是  spawn() 方法的特殊形式 不需要 只是对 node 模块的执行，因此这里省去了 node 命令
   var worker_process = child_process.fork("demo9_support.js", [i]);    

   worker_process.on('close', function (code) {
      console.log('子进程已退出，退出码 ' + code);
   });
}