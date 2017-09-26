/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 注意 netbeans 里面相对路径以 项目目录为起点。因此路径会有问题。
 * 测试代码打开 cmd 进行测试。
 * 
 */




/*
 * 非阻塞代码实例
 * 
 * readFile 异步读取文件，文件读取完毕后，调用回调函数
 */

var fs = require("fs");
//
fs.readFile('input.txt', function (err, data) {
    if (err) return console.error(err);
    console.log(data.toString());
});

console.log("程序执行结束!"); // 先被输出，而文件内容则等待回调