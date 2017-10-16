/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var fs = require("fs");

// 异步打开文件
console.log("准备打开文件！");

/**
 * 打开文件
 */

// err 错误信息，fd 文件标识符，也可以理解为文件资源的引用
fs.open('input.txt', 'r+', function(err, fd) {
   if (err) {
       console.error(err);
       return;
       //return console.(err);
   }
  console.log("文件打开成功！");     
  console.log("fd:"+fd);     
});


/**
 * 获取文件信息
 */

fs.stat('input.txt', function (err, stats) {
   if (err) {
       return console.error(err);
   }
   console.log(stats);
   console.log("读取文件信息成功！");
   
   // 检测文件类型
   console.log("是否为文件(isFile) ? " + stats.isFile());
   console.log("是否为目录(isDirectory) ? " + stats.isDirectory());    
});

/**
 * 异步写入文件
 * 注意因为是异步写入，因此写入文件之后要执行的代码，只能写在回调函数里面
 * 这就是 node 特点有的异步 回调嵌套的问题。
 */

fs.writeFile('input.txt', '我是准备写入的文件内容！',  function(err) {
   if (err) {
       return console.error(err);
   }
   console.log("数据写入成功！");
   console.log("--------我是分割线-------------")
   console.log("读取写入的数据！");
   fs.readFile('input.txt', function (err, data) {
      if (err) {
         return console.error(err);
      }
      console.log("异步读取文件数据: " + data.toString());
   });
});

