/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var http = require('http');
var util = require('util');
var querystring = require('querystring');
 
var postHTML = 
  '<html><head><meta charset="utf-8"><title>普弘 Node.js 实例</title></head>' +
  '<body>' +
  '<form method="post">' +
  '网站名： <input name="name"><br>' +
  '网站 URL： <input name="url"><br>' +
  '<input type="submit">' +
  '</form>' +
  '</body></html>';
/**
 * 注意回调函数的参数的类型。
 * @returns {undefined}
 * 
 * 
 */ 
http.createServer(function (req, res) {
  var body = "";
  // 注意：http://cnodejs.org/topic/4f16442ccae1f4aa2700103d
  // 如果调用 readable.setEncoding() (req 就是 readable对象) 方法明确为流指定了默认编码，回调函数将接收到一个字符串，否则接收到的数据将是一个 Buffer 实例。
  req.on('data', function (chunk) {
    //console.log(util.inspect(chunk));  // chunk buffer 类型
    // console.log(chunk.toString());
    body += chunk;   // 注意这里 实际上是  body += chunk.toString(); 先对 buffer.toString 然后再拼接的。
  });
    req.on('end', function () {

    /** querystring.parse(body);
     * 该方法会把一个 URL 查询字符串 str 解析成一个键值对的集合。
       例子，查询字符串 'foo=bar&abc=xyz&abc=123' 被解析成：
{
  foo: 'bar',
  abc: ['xyz', '123']
}
     */
    body = querystring.parse(body);    // 解析参数
    // 设置响应头部信息及编码
    res.writeHead(200, {'Content-Type': 'text/html; charset=utf8'});
    if(body.name && body.url) { // 输出提交的数据
        res.write("网站名：" + body.name);
        res.write("<br>");
        res.write("网站 URL：" + body.url);
    } else {  // 输出表单
        res.write(postHTML);
    }
    res.end();
  });
}).listen(3000);