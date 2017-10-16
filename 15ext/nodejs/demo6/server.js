/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var http = require("http");
var url = require("url");
 
function start(route) {
  function onRequest(request, response) {
    var pathname = url.parse(request.url).pathname;
    console.log("Request for " + pathname + " received.");
    
      route(pathname);
    
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write("Hello World");
    response.end();
  }
  // http.createServer([requestListener])  参数是一个 监听器函数，会被添加到 request 事件。
  // 也就是当有请求发生时，会调用这些监听器。
  http.createServer(onRequest).listen(8888);
  console.log("Server has started.");
}
 
exports.start = start;