

/**
 * express 框架参考：http://www.runoob.com/nodejs/nodejs-express-framework.html
 * 关于 request  response 参考见以上网址
 *
 * 请求 和 响应 案例
 * 
 */




//express_demo.js 文件
var express = require('express');
var app = express();	// 一个 express 就是一个web应用。



// 访问：127.0.0.1:8081/ 根目录 返回 Hello World
// 可以理解为：对app发起的get 请求处理
app.get('/', function (req, res) {
   
   var str = 'req.baseUrl:'+ req.baseUrl;
   str +=	'<br />' + 'req.hostname:' + req.hostname +
   			'<br />' + 'req.body:' + req.body +
   			'<br />' + 'req.path:' + req.path +
   			'<br />' + 'query:' + req.query;     // query 返回的是对象
   //res.send('Hello World'); // 因为 send 会发送http 头信息，因此不能被执行两次，否则报错。
   res.send(str);
})



// 访问：127.0.0.1:8081/aaa 
app.get('/aaa', function (req, res) {
   res.send('Hello World，aaa');
})


// 定义server 侦听8081 端口，app 的 server 就是一个 web 应用的服务
var server = app.listen(8081, function () {
 
  var host = server.address().address
  var port = server.address().port
 
  console.log("应用实例，访问地址为 http://%s:%s", host, port)
 
})