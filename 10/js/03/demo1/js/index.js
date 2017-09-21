// JavaScript Document
document.write("<br />-------最简单的函数1--------<br />");

function wt(str, str1) {
    
    document.write(str + str1 +  "-----<br />");
}

wt(1, 2);

document.write("<br />-------test1--------<br />");
function test1() {
    document.write("2222<br />");
    return 13332;
}
var b = test1();
document.write("b::" + b);
document.write("<br />");

function demo() {
    document.write("我很爱国<br />");		 //打印不是返回值
    document.write(3333333333333);
    return "这是返回值";
}
//调用
var a = demo();  //函数执行时从调用开始的
document.write("a:" + a);
//alert(a);  //返回 undefined 因为 demo 没有返回值




document.write("<br />-------带参数的函数2222--------<br />");
function wt1(str){
    document.write(str);
}


function demo1(a, b) {
    wt1(a + b);
    wt1("<br />");
    wt1("" + a + b);
}

demo1(2,3)



document.write("<br />-------带参数,有返回值的函数3--------<br />");
function  demo2(str2) {
    var num = 1 + str2;
    return num; //返回值
}
var b = demo2(3);
document.write(b);




document.write("<br />-------变量函数4--------<br />");

var tk = function () {
    document.write(123);
}
tk();

document.write("<br />-------arguments1--------<br />");
function fun(a, b,c) {
    document.write("<br />arguments1111:" + arguments);	 //对象 arguments
    document.write("<br />arguments.length---:" + arguments.length); //传入函数参数的个数
    document.write("<br /><br />");
    document.write("<br />arguments.callee:<pre>" + arguments.callee); // 函数自身的文本
    document.write("</pre><br />");
    document.write("<br />arguments[1]:" + arguments[1]); // 第一个参数
}
//var obj = new fun(1, 2);  // 这样调用也可以
fun(9, 2,5);
document.write("<br />-------arguments2--------<br />");
fun(10, 1,6);

// 面向对象  类 ，属性，方法 抽象 继承 接口
// 类 是 对象的 设计图

document.write("<br />-------定义一个类--------<br />");

/**
 * 类的属性
 * 类的方法
 * @returns {MyClass}
 */
function MyClass() {
    this.p1 = 111;  // 定义属性
    this.p2 = 222;
    this.f1 = function () { // 定义方法
        document.write("方法的调用");
        return 333;
    }
    /*
     function f2(){
     return 444;
     }
     */
}
var a = 1;


var person = new MyClass();
var obj = person;     // 按引用传递

obj.p1 = 555;

document.write("mc.p1:" + person.p1 + "<br />");  // 111
document.write("mc.p2:" + person.p2 + "<br />");  // 222
document.write("mc.f1:" + person.f1() + "<br />");// 方法的调用

//document.write("mc.f2:"+mc.f2()+"<br />");











