/*
        5 数组函数: 方便客户去操作数组。
        toString(); 数组转换成字符串，返回是以“，”间隔的字符串
        join(var); 以固定的分隔符，把数组连接成字符串。返回字符串
        push();为数组追加一个元素，返回数组的长度；
        pop()；删除数组的最后一个元素，且返回该元素。
        shift(); 删除数组的第一个元素，返回该元素。
        unshift(); 为数组在第一个位置添加元素。
        reverse(); 翻转数组；
        sort() 对数组排序
            注意：sort在排10以上的数字的时候，可能会出现排序错误，自定义函数，规定什么数据排序。-1    1,0
        slice(start,end) 截取从start开始，到end结束，中间的数组元素，返回截取出的元素组成的新数组。
                 注意：start 和end 是开始和结束的***位置***（数组的下标）而且不包含end位置的元素。
        splice(start,length,[replace])；从start位置开始，截取数组length长度个元素。
                注意：加了replace参数，将会把前面截取到的元素替换成replace元素。

 */
function wt(str=""){
    document.write("<br />"+str+"<br />");
}
// JavaScript Document
wt("------------------------toString--数组转换成字符串------------------------------");
var arr = ["aaaa","bbbb","cccc","dddd"];
var str = arr.toString();
wt(typeof str);
wt(str);
document.write("<br />---------join-以特定的分隔符把数组转换成字符串----<br />");

var brr = ["aaaa","bbbb","cccc","dddd"];
var str1 = brr.join("#");
document.write(str1);
document.write("<br />---------push-为数组追加一个元素，返回数组的长度；(在最后追加)----------------<br />");
var crr = ["aaaa","bbbb","cccc","dddd"];
wt(crr);
document.write(crr.push("eeee")+"<br />");
document.write(crr);

document.write("<br />---------pop-删除数组的最后一个元素，且返回该元素----------------<br />");
var drr = ["aaaa","bbbb","cccc","dddd"];
document.write(drr+"<br />");
document.write(drr.pop()+"<br />");
document.write(drr+"<br />");
document.write("<br />---------shift-删除数组的第一个元素，返回该元素----------------<br />");
var err = ["aaaa","bbbb","cccc","dddd"];
document.write(err+"<br />");
document.write(err.shift()+"<br />");
document.write(err+"<br />");

document.write("<br />---------unshift--在前面追加，push 后面追加---------------<br />");
var frr = ["aaaa","bbbb","cccc","dddd"];
wt(frr);
wt(frr.unshift("张三"));
document.write(frr);
document.write("<br />---------reverse--翻转数组---------------<br />");
var grr =  ["aaaa","bbbb","cccc","dddd"];
document.write(grr+"<br />");
grr.reverse();
document.write(grr);

/*
如果省略 参数  则按照字符编码顺序排序

比较函数应该具有两个参数 a 和 b，其返回值如下：

若 a 小于 b，在排序后的数组中 a 应该出现在 b 之前，则返回一个小于 0 的值。 
若 a 等于 b，则返回 0。 
若 a 大于 b，则返回一个大于 0 的值。 

 */
document.write("<br />---------sort--排序数组---------------<br />");
function cm(v1,v2){
	if(v1<v2){
		return -1;	
	}else if(v1>v2){
		return 1;	 //两个数组交换位置 .
	}else{
		return 0;
	}
}


var hrr = [3,2,5,4,7,6,12,9,14];
hrr.sort(cm); //两两相比:大的数字往后排，小的数字向前。
//hrr.sort();  // 按照字符编码排序
document.write(hrr);

/*
        slice(start,end) 截取从start开始，到end结束，中间的数组元素，返回截取出的元素组成的新数组。
            注意：start 和end 是开始和结束的***位置***（数组的下标）
            而且不包含end位置的元素。

 */

document.write("<br />---------slice-----------------<br />");

var jrr = [3,2,5,4,7,6,12,9,14];
var jrr = "abcdefg";   // 数组和字符串 用法类似
var krr = jrr.slice(1,3);
document.write(krr);

/**
        splice(start,length,[replace])；从start位置开始，截取数组length长度个元素。
                注意：加了replace参数，将会把前面截取到的元素替换成replace元素。

        arrayObject.splice(index,howmany,element1,.....,elementX)
        第 3-n 个参数 不是替换，而是插入。和删除了几个元素无关，3-n 都只插入一次。

 */
document.write("<br />---------splice--删除4个元素---------------<br />");
var qrr = [3,2,5,4,7,6,12,9,14];
wt(qrr);
var trr = qrr.splice(2,4);  // 5,4,7,6
document.write(qrr);
document.write("<br />---------splice 第3-n个参数- 插入----------------<br />");

var yrr = [3,2,5,4,7,6,12,9,14];
document.write(yrr+"<br />");
var yrr2 = yrr.splice(1,2,'x');   //删除了两个元素但 x 字符 只是被插入了1次。
document.write(yrr2+"<br />");
document.write(yrr+"<br />")









