/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var server = require('./server');  // 引入 server 模块
var route = require('./router');   // 引入路由 router 模块

server.start(route.route);         // 把route方法传递给 start 用于路由处理。

