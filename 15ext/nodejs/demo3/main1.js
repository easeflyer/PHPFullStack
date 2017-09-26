/* 
 * 
在 Node 应用程序中，执行异步操作的函数将回调函数作为最后一个参数， 回调函数接收错误对象作为第一个参数。
fs.readFile('input.txt', function (err, data) {
 * 
以下程序中 fs.readFile() 是异步函数用于读取文件。 如果在读取文件过程中发生错误，错误 err 对象就会输出错误信息。
如果没发生错误，readFile 跳过 err 对象的输出，文件内容就通过回调函数输出。
执行以上代码，执行结果如下：
 */


var fs = require("fs");

fs.readFile('input.txt', function (err, data) {
   if (err){
      console.log(err.stack);
      return;
   }
   console.log(data.toString());
});
console.log("程序执行完毕");