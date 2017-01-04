// JavaScript Document
var dt = new Date(); //创建日期对象
document.write(dt+"<br />");
document.write('dt.getFullYear():'+dt.getFullYear()+"<br />");
//dateObject 的月份字段，使用本地时间。返回值是 0（一月） 到 11（十二月） 之间的一个整数。
document.write('dt.getMonth()+1:'+(dt.getMonth()+1)+"<br />"); 
document.write('dt.getDate():'+dt.getDate()+"<br />");
// 年月 格式 输出
var dates = dt.getFullYear()+"-"+(dt.getMonth()+1)+"-"+dt.getDate();
document.write('dates:'+dates+"<br />");
document.write('dt.getHours()'+dt.getHours()+"<br />");
document.write('dt.getMinutes()'+dt.getMinutes()+"<br />");
document.write('dt.getSeconds()'+dt.getSeconds()+"<br />");
// 时间
var times = dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
document.write('times'+times+"<br />");
// 日期 + 时间
var datetimes  = dates+" "+times;
document.write('datetimes'+datetimes+"<br />");





