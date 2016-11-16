// JavaScript Document
var str = "Abc";
var reg = new RegExp("^abc$","i");  // i 忽略大小写
document.write(reg.test(str));
