// JavaScript Document
document.write("<br />-------------拼接符 +  ------------------<br />");
var str1 = "abc";
var str2 = "def";
var n1 = 12;
var n2 = 6;
var str3 = str1 + str2;
document.write(str3);
document.write(n1 / n2);

document.write("<br />-------------%--取余数----------------<br />");
var n1 = 9;
var n2 = 2;
document.write(n1%n2);

document.write("<br />-------------    ++ /--       ------------------<br />");
var a = 1;
var b = ++a;   // 注意 a++ 和 ++a 的区别 b=a      a = a+1;
//var b = ++a;
document.write("aa:"+a);
document.write("<br />");
document.write("bb:"+b);
document.write("<br />");
var  a = 1;
var b = ++a;  //  a= a+1;    b=a;   a==b==2;
document.write("b:"+b);

document.write("<br />-------------   关系      ------------------<br />");

var  c = 1;
var  d = "3";
//var c = "f";
//var d = "m";
//var c = "a";  //97   ===>a 转换成  数值型    NaN 不是数字
//var d = 2;
//document.write("c>d:");
document.write( c < d );

document.write("<br />-------------   字符串数值比较   ------------------<br />");
var c = "37";
var d = "123";
document.write("<br />");
document.write(c>d);
document.write("<br />-------------   字符串数值 和数值比较   ------------------<br />");
var c = "3";  //  == >"3"转换  3  字符串
var d = 3;	//数值
document.write(c===d); // == true === false;

document.write("<br />-------------   赋值      ------------------<br />");
var  we = 10;
var  te	 = 1;
we += te;  //    we = we + te
document.write(we);

document.write("<br />-------------   &&  ||      ------------------<br />");
var a =    2<3  &&  5>2;
document.write("a:"+a+"<br />");
var b = 4>3  ||  5<2 ;  //两边有一边是true 最终就是true
document.write(b+"<br />");

document.write("<br />-------------   !    ------------------<br />");
var c = 5>4;
document.write("c:"+!c+"<br />");
var d = "";
document.write("d:"+!d);

document.write("<br />-------------   三元运算符   ------------------<br />");
// var 变量 = 条件 ？ 条件成立取值 : 条件不成立取值
var s =     5>3    ?     "ok"    :    "no";
document.write("s:"+s+"<br />");

var t =      !    (2        ?    "yes"   :    "error");
document.write(t);



document.write("<br />-------------   undefined  == null   ------------------<br />");
var aaa = null;
var bbb = undefined; 
document.write(bbb == aaa);
document.write(bbb === aaa);
document.write("<br />");

document.write(   11 < 123       );





















