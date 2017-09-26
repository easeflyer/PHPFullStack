/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * 阻塞代码实例
 * readFileSync  同步读取
 */


var fs = require("fs");

// 没有使用回调函数，因此程序要等待读取完毕再执行下一条语句。
var data = fs.readFileSync('input.txt');

console.log(data.toString()); // 先输出
console.log("程序执行结束!");  // 后输出

