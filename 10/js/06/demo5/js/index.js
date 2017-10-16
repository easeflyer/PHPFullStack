// JavaScript Document
var str = "Abc";
var reg = new RegExp("^abc$","i");  // i 忽略大小写
document.write(reg.test(str));



var str1 = "aaaabbbcccddd\neeefff";
var reg1 = /[a-z]{5}[^0-9]*f{3}/;
document.write(reg1.test(str1));