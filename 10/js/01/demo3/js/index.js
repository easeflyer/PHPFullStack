// JavaScript Document
// 函数是什么？
function wt(str){
    document.write(str);
}
// 注意 name 是关键词 默认会当做字符串处理；
var  a = 11;  //第一次声明
var  b = 2;
var  name1 = "lisi";	 //第二次声明 覆盖前一次的声明。
//var name;              // 如果第二次声明没有赋值 不影响之前的结果
//document.write(name);
wt(a + b);
wt("<br />wt:" + name1);       

//name = n1/0;
//document.write(name);
wt("<br />-------------------3------------------<br />");
var demo,demo1,demo2,demo3;
demo = "我很1111<br />爱国";
demo1 = 1;
demo2 = 2;
wt(demo1+demo2);

wt("<br />------------undefined-------------------------<br />");
var  test; //生命变量但不赋值  如果不声明变量直接输出 则造成错误，通过浏览器可以查看错误
//test = "已经赋值";
wt(test);

wt("<br />------------number-------------------------<br />");
//数值型 不带 ""
var  n1 = 3.14;
wt(n1);

wt("<br />------------boolean-------------------------<br />");
var  bn = false;  // true  == 1  真;  false 假 0
wt(bn);
var bn1 = true;
var bn2 = 1;
//alert("这是一个弹出窗口");
//alert(true==1);   //true==1   判断 是真的   true
var bn3= false;
var bn4 = 0;
//alert(bn3==bn4);  //false == 0 ；

wt("<br />------------typeof-------------------------<br />");

var  userName = "tom";
var  age = 3.14;
var  bn5 = true;  // boolean
wt("bn5的数据类型是：" + typeof(bn5) + "<br />");  // 显示 bn5 的数据类型 boolean
wt("这里：" + typeof 3);   // typeof 是运算符
wt("<br />");
wt( typeof(wt) ); // eval 是函数
wt("<br />");
wt("这里1：" + typeof("abc") );

wt("<br />------------大小写-------------------------<br />");

var userNameAge = "zhangsan";

var a = "111";
var A = "222";
wt(a+A);
//wt(""+a+A); // 类型自动转换


wt("<br />------------引用类型-------------------------<br />");

function obj(){
    this.p1 = "p11";
    this.p2 = "p22";
}


// 引用数据类型 存储的是 对象的引用或者说是地址，而不是对象本身。
var obj1 = new obj(); // 实例化对象 new  关键词
var obj2 = obj1;
obj1.p1 = "p11111111";
wt(obj2.p1);

wt("<br />typeof obj1 =================================================<br />");
wt(typeof(obj1));
//wt(obj1.p1);














