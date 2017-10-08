/**
 * 关于 mysql 模块 参考：https://github.com/mysqljs/mysql/   官方 github
 */


var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'root',
  database : 'test'
});
 
connection.connect();
 
connection.query('SELECT 1 + 11 AS solution', function (error, results, fields) {
  if (error) throw error;
  console.log('The solution is: ', results[0].solution);
  connection.destroy(); // 终止连接
  //connection.end();
});
