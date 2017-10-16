// JavaScript Document
function wt(str){
    document.write("<br />"+str+"<br />");
}
// JavaScript Document
document.write("<br />---------邮编----------<br />");
var str = "123a45";
var reg = new RegExp("^[0-9]{6}$");
var reg1 = /\d{6}/;  // \d 等价于 [0-9]
document.write(reg.test(str));
var str = "050021";
wt(reg1.test(str));

document.write("<br />---------日期----------<br />");
var str1 = "2014-4-15";
var reg1 = new RegExp("^\\d{4}-\\d{1,2}-\\d{1,2}$");
document.write(reg1.test(str1));
