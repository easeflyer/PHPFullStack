// JavaScript Document
function wt(str){
    document.write("<br />"+str+"<br />");
}
document.write("<br />------------  .  ------------<br />")
var str = "google";
var reg = new RegExp("go.gle");
wt(reg.test(str));

document.write("<br />--------- \d   ----------------<br />");
var mode4 = /\d/;
var  reg4 = new RegExp(mode4);
var str4 = "q";
var str4 = "2323"; // true
document.write(reg4.test(str4));


document.write("<br />------------*-0次或多次-----------<br />")
var str1 = "goooooooooooooooogle";
var reg1 = new RegExp("go*gle");  //   g.*gle
document.write(reg1.test(str1));

document.write("<br />------------+--1次或多次----------<br />")
var str2 = "ggle";
var reg2 = new RegExp("go+gle");  //   g.*gle
document.write(reg2.test(str2));


document.write("<br />------------？-0次或1次-----------<br />")
var str3 = "google";
var reg3 = new RegExp("go?gle");  //   g.*gle
document.write(reg3.test(str3));

document.write("<br />------------{m,n}--最少m-最多n次----------<br />")
var str4 = "gooooogle";
var reg4 = new RegExp("go{2,}gle");  //   g.*gle
document.write(reg4.test(str4));

document.write("<br />------------^ $------------<br />")
var str5 = "google";
//var str5 = "googles";  //false
var reg5 = new RegExp("^go.gle$");  //   g.*gle
document.write(reg5.test(str5));
document.write("<br />------------^ $------------<br />")
var str6 = "google";
var reg6 = new RegExp("^google$");  //   只匹配google本身
document.write(reg6.test(str6));

document.write("<br />------------（）------------<br />")
var str7 = "abc4322342341414abc";  // 字符匹配 0个到任意多
//正则反向引用： （）   后边如果再用 \1 转义字符去调用  \\ 转义\为控制符  \1
// 应为是用的 regexp 后面的是字符串，因此是 \\1
var reg7 =  new RegExp("^(abc)[0-9]{1,}\\1$"); 
var reg6 = /^(abc)[0-9]{1,}\1$/;  // 和上面的正则一样。
wt(reg7.test(str7));
wt(reg6.test(str7));
document.write("<br />------------|------------<br />")
var str8 = "cn";
//var str8 = "cs"; // false
var reg8 =  new RegExp("com|cn|org|net");
document.write(reg8.test(str8))










