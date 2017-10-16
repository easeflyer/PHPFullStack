


var mysql = require('mysql');
var express = require('express');
var app = express();



/**
 * 
 */

app.get('/getinfo', function(req, res) {

    var connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: 'root',
        port: '3306',
        database: 'test',
    });

    connection.connect();
    // 所有数据读取出来
    var sql = 'SELECT * FROM info';

    var html = '';
    //查
    connection.query(sql, function(err, result) {
        if (err) {
            console.log('[SELECT ERROR] - ', err.message);
            return;
        }

        var i = 0;
        while (result[i]) {
            console.log(html);
            //html += '<!--sssssssssssssss-->';
            html += '<tr><td>' + i + '</td><td>' + result[i].title + '</td><td>' + result[i].href + '</td><td>' + result[i].src + '</td></tr>';
            i++;
        }
        html = '<table border=1><tr><td>序号</td><td>标题</td><td>网址</td><td>图片地址</td></tr>' + html + '</table>';
        res.set({ 'Content-Type': 'text/html', 'charset': 'utf-8' }); // 这种方式也可以 参看：http://www.expressjs.com.cn/4x/api.html#res.send
        res.send(html); // 

    });
    connection.end();
    // html = '<table><tr><td>序号</td><td>标题</td><td>网址</td><td>图片地址</td></tr>'+html+'</table>';  注意异步的问题。这里可能会先执行。
    //res.writeHead(200,{'Content-Type':'text/html;charset=utf-8'});//设置response编码为utf-8
    //res.set({'Content-Type':'text/html','charset':'utf-8'});  // 这种方式也可以 参看：http://www.expressjs.com.cn/4x/api.html#res.send
    //res.send(html);  // 写在这里也是有问题的，因为上面的函数是回调，是异步的，这里可能会先执行。因此html 可能根本没有内容。
})


// 定义server 侦听8081 端口，app 的 server 就是一个 web 应用的服务
var server = app.listen(8081, function() {

    var host = server.address().address
    var port = server.address().port

    console.log("应用实例，访问地址为 http://%s:%s", host, port)

});