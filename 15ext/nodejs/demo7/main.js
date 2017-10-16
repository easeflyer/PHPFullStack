/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 全局变量 __filename  __dirname
 */
console.time("ssss");

console.log( __filename );  // 当前文件路径和文件名
console.log( __dirname );   // 当前路径

function printHello(){
   console.log( "Hello, World!");
}
// 两秒后执行以上函数  全局函数
setTimeout(printHello, 2000);


function printHello1(){
   console.log( "Hello, World! 2");
}
// 两秒后执行以上函数
var t = setTimeout(printHello1, 4000);

// 清除定时器
clearTimeout(t);



function printHello(){
   console.log( "Hello, World! 3");
}
// 两秒后执行以上函数
var t1 = setInterval(printHello, 2000);

clearInterval(t1);
//console.time("ssss");
console.timeEnd("ssss");