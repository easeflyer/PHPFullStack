/**
 * mysql 模块更新 数据的使用
 */

var mysql  = require('mysql');  
 
var connection = mysql.createConnection({     
  host     : 'localhost',       
  user     : 'root',              
  password : 'root',       
  port: '3306',                   
  database: 'test', 
}); 
 
connection.connect();


// 注意问号的使用，也是和 modSqlParams 一一对应
var modSql = 'UPDATE websites SET name = ?,url = ? WHERE Id = ?';
var modSqlParams = ['菜鸟移动站1', 'https://m.runoob.com',6];
//改
connection.query(modSql,modSqlParams,function (err, result) {
   if(err){
         console.log('[UPDATE ERROR] - ',err.message);
         return;
   }        
  console.log('--------------------------UPDATE----------------------------');
  console.log('UPDATE:',result);
  console.log('-----------------------------------------------------------------\n\n');
  console.log('UPDATE affectedRows',result.affectedRows);
});

// --------------------------UPDATE----------------------------
// UPDATE affectedRows OkPacket {
//   fieldCount: 0,
//   affectedRows: 1,
//   insertId: 0,
//   serverStatus: 2,
//   warningCount: 0,
//   message: '(Rows matched: 1  Changed: 1  Warnings: 0',
//   protocol41: true,
//   changedRows: 1 }
// -----------------------------------------------------------------

connection.end();