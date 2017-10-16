/**
 * mysql 模块插入数据
 */

var mysql  = require('mysql');  
 
var connection = mysql.createConnection({     
  host     : 'localhost',       
  user     : 'root',              
  password : 'root',       
  port: '3306',                   
  database: 'test', 
}); 
// 连接数据库 
connection.connect();

// 注意几个问号的使用：问号和 addSqlParams 的数组是一一对应的。
// 
//var  addSql = 'INSERT INTO websites(id,name,url,alexa,country) VALUES(0,?,?,?,?)';
var  addSql = 'INSERT INTO websites(name,url,alexa,country) VALUES(?,?,?,?)';  // 上面的 sql 语句也是可以的。
var  addSqlParams = ['菜鸟工具', 'https://c.runoob.com','23453', 'CN'];
// query 执行 addSql ,addSqlParams 将会替换问号
connection.query(addSql,addSqlParams,function (err, result) {
        if(err){
         console.log('[INSERT ERROR] - ',err.message);
         return;
        }        
 
       console.log('--------------------------INSERT----------------------------');
       //console.log('INSERT ID:',result.insertId);        
       console.log('INSERT ID:',result);        
       console.log('-----------------------------------------------------------------\n\n');  
});

// 返回的结果：
// --------------------------INSERT----------------------------
// INSERT ID: OkPacket {
//   fieldCount: 0,
//   affectedRows: 1,
//   insertId: 8,
//   serverStatus: 2,
//   warningCount: 0,
//   message: '',
//   protocol41: true,
//   changedRows: 0 }
// -----------------------------------------------------------------

connection.end();