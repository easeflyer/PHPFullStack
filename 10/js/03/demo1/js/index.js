// JavaScript Document
document.write("<br />-------最简单的函数1--------<br />");
function demo() {
    document.write("我很爱国<br />");		 //打印不是返回值
    document.write(3333333333333);
    return "这是返回值";
}
//调用
var a = demo();  //函数执行时从调用开始的
document.write(a);
//alert(a);  //返回 undefined 因为 demo 没有返回值




document.write("<br />-------带参数的函数2--------<br />");
function demo1(a,b) {
    document.write(a+b);
    document.write("<br />");
    document.write(""+a+b);
}
demo1(2,3);




document.write("<br />-------带参数,有返回值的函数3--------<br />");
function  demo2(str2) {
    var num = 1 + str2;
    return num; //返回值
}
var b = demo2(3);
//document.write(b);




document.write("<br />-------变量函数4--------<br />");

var tk = function () {
    document.write(123);
}
tk();

document.write("<br />-------arguments--------<br />");
function fun(a, b) {
    document.write("<br />arguments:"+arguments);	 //对象 arguments
    document.write("<br />arguments.length:"+arguments.length); //传入函数参数的个数
    document.write("<br /><br />");
    document.write("<br />arguments.callee:<pre>"+arguments.callee); // 函数自身的文本
    document.write("</pre><br />");
    document.write("<br />arguments[1]:"+arguments[1]); // 第一个参数
}
//var obj = new fun(1, 2);  // 这样调用也可以
fun(9,2);
document.write("<br />-------arguments--------<br />");
fun(10,1);


document.write("<br />-------定义一个类--------<br />");

function MyClass(){
    this.p1 = 111;  // 定义属性
    this.p2 = 222;
    this.f1 = function (){ // 定义方法
        return 333;
    }
    /*
    function f2(){
        return 444;
    }
    */
}

var mc = new MyClass();
var mc1 = new MyClass();

document.write("mc.p1:"+mc.p1+"<br />");
document.write("mc.p2:"+mc.p2+"<br />");
document.write("mc.f1:"+mc.f1()+"<br />");
//document.write("mc.f2:"+mc.f2()+"<br />");













