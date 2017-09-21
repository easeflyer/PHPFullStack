/**
 * 知识点:
    一 、 数组 以及 数组方法

 */

function wt(str){
    document.write("<br />"+str+"<br />");
}

/*
    1 什么是数组:

        var a = 123;  //声明变量；
        var b = 234；。。。。。
        数组出现:解决了大量的变量相关的存储和使用。
                理解: 变量的集合。

    2 创建数组: 数组在js中是以对象的形式存在。

        1》通过对象的方式来创建数组:****
             var arr = new Array(); //创建数组 new 创建对象的关键字。
            对数组赋值:
                A 在声明的时候赋值:
                    var arr  = new Array(123,456,789,"aaa",true);
                    数组使用:
                        数组名称[下标] ：使用数组的值。下标 是从0开始的一组数字,数组的元素个数，基本上够用就好。
                        注意：数组最后一个元素的下标  元素个数-1；
                    补充内容:
                        .length:属性  数组的元素个数


                B 先声明数组，完后在赋值:
                    var brr = new Array(); //声明了一个空数组。
                     brr[0] = 123;
                     brr[1] = 456;
                     brr[2] = 789;
*/
var arr = new Array();

wt("arr的类型是："+ typeof arr);
document.write("<br />------数组声明的时候赋值---------<br />");
var  arr = new Array(456,789,"bbaaaaa",true,6666);

wt(arr[1]);
wt("元素个数："+arr.length); //返回数组的元素个数。  最后一个元素的下标，元素个数-1****;
document.write("<br />------数组先声明，在赋值---------<br />");


var brr = new Array(); //声明了一个空数组。
brr[0] = 123;
brr[1] = 456;
brr[2] = 789;	
brr[3]="aaa";
wt(brr[3]);
wt(brr.length);  // 数组元素的个数
/*
        2》 用 [] 来定义数组:

        var crr = []; //定义了数组
                A 声明时候赋值
                    var crr = [123,"aaa",true];
                B 先声明，在赋值
                   var drr = []
                   drr[0] = 123;
                   drr[1] = "aaa";
                   drr[2] = false;

        注意： js中的数组可以存放任意类型的值。 而且下标 都是从0开始的，最后一个元素的下标arr.length-1****;

 */


document.write("<br />------用【】来声明数组---------<br />");
var crr = [];

wt(typeof crr);
var crr = [123,"aaa",true];
//alert(crr[2]);
document.write("<br />------用【】来声明数组,先声明，在 赋值---------<br />");
var drr = [];
drr[0] = 123;
drr[1] = "aaa";
drr[2] = false;
wt(drr.length);
wt(drr[2]);
/*
        3. 遍历数组 (常用)
        遍历: 可以访问到数组中的所有值。用循环遍历的。所有的循环都可以遍历数组。
            1》 for 循环遍历数组
                for(起始条件;终止条件;步长){
                    循环体;
                }
            2> js 专门提供一种遍历数组的循环 for ...in
                for(var i in array){  //i是数组的下标 
                    循环体
                }

 */


document.write("<br />------for遍历数组---------<br />");

var frr  = ["zhangsan","nan","电话不祥",170,"最后一个元素"];

for(var i=0;i<frr.length;i++){
    
        if(i==2)document.write("某人的：");
	document.write(frr[i]+"<br />");	
}


document.write("<br />------for....in遍历数组---------<br />");

var grr = ["aaaa","bbbbb","cccc","ddddd","eeee"];
for(var i in grr){   // i 就是数组下标。
	//document.write(i+"<br />");	//array[i]
	document.write(grr[i]+"<br />");
}

/*
        4. 数组的分类:
            1> 下标为数字 的数组   (索引数组);
                    var arr = new Array();
                    var brr = [];
            2>  字符串为下标的数组 （关联数组）
                var hrr = new Array();
                hrr["one"] = "aaa";
                hrr["demo"] = "bbbb";
                hrr["test"] = "cccc";
           3>二维或二维以上的数组  （多维数组）;
               var jrr = new Array(
                                new Array(
                                        new Array(
                                                .....
                                        ),
                                        new Array()
                                ),
                                new Array(),
                                new Array()
                            )
            var krr = new Array(
                                new Array(111,222,333),
                                new Array(444,555,666),
                                new Array(7777,888,9999)
                            )   
            注意：访问二维数组 必须下标有两个
                遍历二维数组需要用两重循环。

 */
document.write("<br />------字符串作为下标---------<br />");
// 关联数组的 .length 无实际意义   .length 仅仅是最大下标+1
var hrr = new Array(1,2,3);
hrr["one"] = "aaa";
hrr["demo"] = "bbbb";
hrr["test"] = "cccc";
hrr[13] = "dddd";
wt("length:"+hrr.length);

for (var j in hrr) {
    //document.write(j+"<br />");	
    document.write(hrr[j] + "<br />");
}

document.write("<br />------二维数组---------<br />");

var brr = [
    [1,2,3],
    [11,22,33],
    [111,222,333],
];


var krr = new Array(
        new Array(111, 222, 333),
        new Array(444, 555, 666),
        new Array(7777, 888, 9999)
        );


//alert(krr[1][1]);
for (var m in krr) {
    //alert(krr[m]);	 // 111,222,333
    for (var n in krr[m]) {
        wt(krr[m][n]);
    }
}














