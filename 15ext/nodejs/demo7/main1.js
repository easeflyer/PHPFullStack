/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


process.on('exit', function(code) {

  // 以下代码永远不会执行 这个进程已经要退出了。换句话说就是最后一个事件响应，不能再执行其他了。
  setTimeout(function() {  // 又是异步的，因此不再执行。
    console.log("该代码不会执行");
  }, 0);
  
  console.log('退出码为:', code);
});
console.log("程序执行结束");




console.log("------------------------------------------------");
// 输出到终端
process.stdout.write("Hello World!" + "\n");

// 通过参数读取
process.argv.forEach(function(val, index, array) {
   console.log(index + ': ' + val);
});

// 获取执行路径
console.log("执行路径："+process.execPath);


// 平台信息
console.log("平台信息："+process.platform);

// 输出当前目录
console.log('当前目录: ' + process.cwd());

// 输出当前版本
console.log('当前版本: ' + process.version);

// 输出内存使用情况
console.log(process.memoryUsage());