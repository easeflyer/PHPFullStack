/* 
 * 代码需要 express 支持因此需要先安装 express
 * 在当前目录下 执行：
 * npm install express --save  即可安装 express  
 */
/*
var http = require('http');

http.createServer(function (request, response) {

	// 发送 HTTP 头部 
	// HTTP 状态值: 200 : OK
	// 内容类型: text/plain
	response.writeHead(200, {'Content-Type': 'text/plain'});

	// 发送响应数据 "Hello World"
	response.end('Hello World^_^\n');
}).listen(8888);

// 终端打印如下信息

*/



var http = require('http');
http.createServer(function(request, response){
    console.log(request.id);
    response.writeHead(200,{'Content-type':'text/plain'});
    response.end("hello");
}).listen(8888);


console.log('Server running at http://127.0.0.1:8888/');