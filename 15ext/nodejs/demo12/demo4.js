/**
 * 用 req.query 来接收 get 参数，并作出相应的处理
 * 用 /process_get 路由url 来处理 get 请求
 */


var express = require('express');
var app = express();
 
app.use(express.static('public'));

//  路由 请求demo4.html 转换为 sendFile 获得 demo4.html
app.get('/demo4.html', function (req, res) {
   res.sendFile( __dirname + "/" + "demo4.html" );
})
 
app.get('/process_get', function (req, res) {
 
   // 输出 JSON 格式
   var response = {
       "first_name":req.query.first_name,    // req.query 是个对象
       "last_name":req.query.last_name
   };
   console.log(response);
   res.end(JSON.stringify(response));  // 注意 res.send  res.end 第一个参数 必须是 string 或者 buffer 不能直接是 json 对象
   //res.end(response);
})
 
var server = app.listen(8081, function () {
 
  var host = server.address().address
  var port = server.address().port
 
  console.log("应用实例，访问地址为 http://%s:%s", host, port)
 
})