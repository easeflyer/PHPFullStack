// JavaScript Document
document.write("<br />-------内置函数--------<br />");
var str = "我++++很++++爱++++国";
var str1 = escape(str);
var str2 = unescape(str1);
document.write("编码处理之后的结果："+str1+"<br />");
document.write("反编码之后的结果："+str2);

//document.write(unescape(escape(str)));
document.write("<br />");
// 建议使用下面两个方法
document.write("encodeURI(str):"+encodeURI(str)+"<br />");
document.write("反编码后："+decodeURI(encodeURI(str)));


document.write("<br />-------内置函数 eval--------<br />");
var str1 =  "alert('1234444')"; //普通字符串 不会弹出
//document.write(str1);
window.eval(str1);
//alert('1234444');




document.write("<br />-------eval --------<br />");

document.write(String(1)+String(2));

window.onload = function(){
    var ipt1 = document.getElementById("ipt1");
    var bt1 = document.getElementById("bt1");
    bt1.onclick = function(){
        window.eval(ipt1.value);
    }
    
}