

// JavaScript Document
// 方括号

function wt(str){
    document.write("<br />"+str+"<br />");
}

document.write("<br />---------两种方式创建正则对象----------------<br />");
var str = "wo hen ai guo";
//编写正则表达式
var mode = "wo";
var  reg = new RegExp(mode);
wt(reg.test(str)); //查看 str 是否有满足mode的内容
var mode1 = /ai/;  //可以直接 test
wt(mode1.test(str));


document.write("<br />---------  [a-z]   ----------------<br />");
var mode2 = /[a-z]/;
var  reg2 = new RegExp(mode2);
var str2 = "3";  // false
//var str2 = "3f"; //true
document.write(reg2.test(str2));
document.write("<br />---------  [^0-9]   ----------------<br />");
var mode3 = /g[0-9][^0-9]gle/;
var  reg3 = new RegExp(mode3);
var str3 = "g32gle";  // false
//var str3 = "g3ogle"; //true
document.write(reg3.test(str3));







