

// JavaScript Document
// 方括号

function wt(str){
    document.write("<br />"+str+"<br />");
}

document.write("<br />---------两种方式创建正则对象----------------<br />");
var str = "wo hen ai guo";
//编写正则表达式
var mode = "hen";
var reg = new RegExp(mode);
wt("test 的结果：" + reg.test(str)); //查看 str 是否有满足mode的内容

var mode1 = /ai/;  //可以直接 test
wt("mode1:"+mode1.test(str));


document.write("<br />---------  [a-z]   ----------------<br />");

//var  reg2 = new RegExp(mode2);
var str2 = "123456abcd";  // false
var mode2 = /[0-9]/;
//var str2 = "3f"; //true
document.write("mode2:"+mode2.test(str2));
document.write("<br />---------  [^0-9]   ----------------<br />");
var mode3 = /g[0-9][^0-9]gle/;
//var  reg3 = new RegExp(mode3);
var str3 = "g3zgle";  // false
//var str3 = "g3ogle"; //true
document.write(mode3.test(str3));

document.write("<br />---------  {}   ----------------<br />");

var str5 = "aaaabbbbcccccc555556666sssss";
var mode5 = /b{5}/;
document.write("mode5:"+mode5.test(str5));




/*
 * exec 使用较为复杂参考手册
 */

document.write("<br />---------  exec   ----------------<br />");

var str4 = "aaabbbcccddddeeeffff111222333";
var mode4 = /([a-z])\1{3}/g;//  匹配4个重复字符  \1 引用()里的匹配结果  去掉g arr1 没有结果
var arr = mode4.exec(str4);
var arr1 = mode4.exec(str4);
wt("arr 的字符串表现形式："+arr);  // arr 的 字符串表现形式
wt("arr1 的字符串表现形式："+arr1);  // arr 的 字符串表现形式

for(i in arr){
    wt("元素["+i+"]:"  +   arr[i]);
}


document.write("<br />---------  exec2   ----------------<br />");

var str5 = "aaabbbcccddddeeeffff111222333";
var mode5 = /([a-z])\1{3}(.{3})/;
var arr = mode5.exec(str5);
wt("arr 的字符串表现形式："+arr);  
for(i in arr){
    wt("元素["+i+"]:"  +   arr[i]);
}