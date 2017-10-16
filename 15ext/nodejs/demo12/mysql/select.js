var mysql  = require('mysql');  

var connection = mysql.createConnection({     
  host     : 'localhost',       
  user     : 'root',              
  password : 'root',       
  port: '3306',                   
  database: 'test', 
}); 

connection.connect();

var  sql = 'SELECT * FROM websites';
//查
connection.query(sql,function (err, result) {
  if(err){
    console.log('[SELECT ERROR] - ',err.message);
    return;
  }

  console.log('--------------------------SELECT----------------------------');
  console.log(result);
  console.log('------------------------------------------------------------\n\n');  

  // 以下遍历输出数据
  var i=0;
  while(result[i]){
    console.log(result[i].name+'\n');
    i++;
  }

});

connection.end();