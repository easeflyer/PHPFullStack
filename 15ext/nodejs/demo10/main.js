/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var http = require('http');
var url = require('url');
var util = require('util');

/**
 * 测试输入：http://127.0.0.1:3000/user?uname=zhangsan&age=22&city=河北
 * 
 * http.createServer([requestListener])   返回： <http.Server>
 * 参考：http://nodejs.cn/api/http.html#http_http_createserver_requestlistener
 * requestListener 是一个函数，会被自动添加到 'request' 事件。
 * 'request' 事件 每次接收到一个请求时触发。 注意，每个连接可能有多个请求（在 HTTP keep-alive 连接的情况下）。
 * 参考：http://nodejs.cn/api/http.html#http_event_request
 * request <http.IncomingMessage> req对象  response <http.ServerResponse> res 对象
 * http.IncomingMessage 类 它实现了 可读流 接口，还有以下额外的事件、方法、以及属性。
 * stream.Readable 类（可读流） 这里有对 data 事件的描述。
 * 
 * 也就是说：发生 request 事件时调用requestListener， 因此 requestListener 函数的参数应该 在 request 事件定义时给出。
 * 参考：http://nodejs.cn/api/http.html#http_event_request
 * request <http.IncomingMessage> req对象  因此 request 的类型为 IncommingMessage 类型，具有 url 属性
 * 
 */
http.createServer(function(req, res){
    res.writeHead(200, {'Content-Type': 'text/plain; charset=utf-8'});
    /**
     * response.end([data][, encoding][, callback])
     * 参考：http://nodejs.cn/api/http.html#http_response_end_data_encoding_callback
     * 
     * util.inspect() 方法返回 object 的字符串表示，主要用于调试。 不同于 toString
     * url.parse() 方法会解析一个 URL 字符串 req.url 并返回一个 URL 对象。
     */
    res.write(req.url + "<br />");
    res.write(  util.inspect(  url.parse(req.url, true)
              )   
            );
    
        // 解析 url 参数
    var params = url.parse(req.url, true).query;
    res.write("网站名：" + params.name);
    res.write("\n");
    res.write("网站 URL：" + params.url);
    res.end();
    
    
}).listen(3000);