/**
 *  post 的处理方式
 */


var express = require('express');
var app = express();
var bodyParser = require('body-parser');
 
// 创建 application/x-www-form-urlencoded 编码解析
// 默认情况下 node 并不知道如何处理 post 的 body，这里通过引入了 body-parser 来进行处理。
var urlencodedParser = bodyParser.urlencoded({ extended: false })
 
//app.use(express.static('public'));
 
app.get('/demo5.html', function (req, res) {
   res.sendFile( __dirname + "/" + "demo5.html" );
})
// 使用 urlencodeParser 对 body 进行解析处理
app.post('/process_post', urlencodedParser, function (req, res) {
 
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