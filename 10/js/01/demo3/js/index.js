// JavaScript Document
function wt(str){
    document.write(str);
}

var  name = "zhangsan";  //第一次声明
var  name = "lisi";	//第二次声明 覆盖前一次的声明。
//var name;              // 如果第二次声明没有赋值 不影响之前的结果
document.write(name);
wt("<br />-------------------------------------<br />");
demo = "我很爱国";
wt(demo);

wt("<br />------------undefined-------------------------<br />");
var  test; //生命变量但不赋值  如果不声明变量直接输出 则造成错误，通过浏览器可以查看错误
wt(test);

wt("<br />------------number-------------------------<br />");
//数值型 不带 ""
var  n1 =3.14;
wt(n1);

wt("<br />------------boolean-------------------------<br />");
var  bn = false;  // true  == 1;
wt(bn);
var bn1 = true;
var bn2 = 1;
//alert(true==1);   //true==1   判断 是真的   true
var bn3= false;
var bn4 = 0;
//alert(bn3==bn4);  //false == 0 ；

wt("<br />------------typeof-------------------------<br />");
var  userName = "tom";
var  age = 3.14;
var  bn5 = true;
wt(typeof(bn5));  // 显示 bn5 的数据类型 boolean
wt(typeof 3);   // typeof 是运算符
//wt( typeof(eval) ); // eval 是函数

wt("<br />------------大小写-------------------------<br />");

var a = 111;
var A = 222;
wt(a+A);
wt(""+a+A); // 类型自动转换


wt("<br />------------引用类型-------------------------<br />");

function obj(){
    this.p1 = "p1";
    this.p2 = "p2";
}
var obj1 = new obj(); // 实例化对象 new  关键词
wt(typeof(obj1));
wt(obj1.p1);














