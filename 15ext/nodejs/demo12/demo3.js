var express = require('express');
var app = express();

// 设置当前路径下  public，public1 为静态文件目录，注意这两个目录都是静态文件路径。
// 当有get 请求静态文件时，如果第一个目录中没有，则从第二个目录搜索资源。
app.use(express.static('public'));
app.use(express.static('public1'));
 
app.get('/', function (req, res) {
   res.send('Hello World');
})
 
var server = app.listen(8081, function () {
 
  var host = server.address().address
  var port = server.address().port
 
  console.log("应用实例，访问地址为 http://%s:%s", host, port)
 
})