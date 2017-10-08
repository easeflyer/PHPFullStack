/**
 *  post 的处理方式 2
 *  使用 app.use 注册 urlencoded 处理 post 内容
 *  参考：http://www.cnblogs.com/A-dam/p/5053299.html
 *  参考：http://www.html-js.com/article/1603
 */


var express = require('express');
var app = express();
var bodyParser = require('body-parser');
 
// 创建 application/x-www-form-urlencoded 编码解析
// 默认情况下 node 并不知道如何处理 post 的 body，这里通过引入了 body-parser 来进行处理。
//var urlencodedParser = bodyParser.urlencoded({ extended: false })
 
//app.use(express.static('public'));

// use 作用是绑定一个中间件函数 到 path ；path是use 的第一个参数，如果忽略默认是 /
// 意思是 将所有对 path 区域内的请求 先交给 注册的中间件函数来处理
// 参考：http://www.runoob.com/w3cnote/express-4-x-api.html  这里中文 express 文档翻译很好
app.use(bodyParser.urlencoded({    
  extended: true
}));
 
app.get('/demo5.html', function (req, res) {
   res.sendFile( __dirname + "/" + "demo5.html" );
})
// 使用 urlencodeParser 对 body 进行解析处理
app.post('/process_post', function (req, res) {
 
   // 输出 JSON 格式
   var response = {
       "first_name":req.body.first_name,
       "last_name":req.body.last_name
   };
   console.log(response);
   res.end(JSON.stringify(response));
})
 
var server = app.listen(8081, function () {
 
  var host = server.address().address
  var port = server.address().port
 
  console.log("应用实例，访问地址为 http://%s:%s", host, port)
 
})