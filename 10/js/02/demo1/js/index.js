// JavaScript Document
document.write("<br />-------------转换成数值型--------------<br />");
var bl = true;
document.write(Number(bl)+"\t(false)<br />");

var nu = null;
document.write(Number(nu)+"\t(null)<br />");

var un1 = undefined;
document.write(Number(un1)+"\t un1(undefined)<br />");

var un;
document.write(Number(un)+"\t  un(undefined)<br />");

var str1 = "123"; 
document.write(Number(str1)+"\t（数值字符串）<br />");

var str2 = ""; 
document.write(Number(str2)+"\t(空字串)<br />");

var str3 = "a323bc"; 
document.write(Number(str3)+"\t(字串)<br />");

var str4 = "12345";
document.write(parseInt(str4)+"\t(转换成 整形数)<br />"); //已经转换成 整形数

var str5 = "16"; // 8进制 转 10进制  8+6 = 14   第二个参数8代表str5 是8进制数字
document.write(parseInt(str5,8)+"\t(用8进制16转换10进制数字)<br />");  //8进制转换

var str6 = "3.14";
document.write(parseFloat(str6)+"\t(转换成浮点值)<br />");

document.write("<br />-------------转换成字符串型--------------<br />");
//null  undefined 控制符  ==》 字符串   "null"  "undefined"  
var str7 = null;
document.write(String(str7)+"\t(转换成字符串)<br />");
var str7 = undefined ;
document.write(String(str7)+"\t(转换成字符串)<br />");
var str7 = true;
document.write(String(str7)+"\t(转换成字符串)<br />");
document.write("<br />-------------array.toString--------------<br />");
var arr1 = [1,2,3,4];
document.write(arr1.toString()+"---abcde");

document.write("<br />-------------隐式转换--------------<br />");
var n1 = "12";
var n2 = 7;
var n3  =  n1 % n2;// +只能拼接  其他运算符 ，计算的是结果 先把12 转换成整数 在与7进行运算
document.write(n3);
document.write("<br />");


document.write(""+1+3);

document.write("<br />-------------isNaN--非数字------------<br />");
document.write(isNaN("111"));

