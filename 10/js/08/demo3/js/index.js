function wt(str){
    document.write("<br />"+str+"<br />");
}

wt("----------- prototype - 为所有类添加新方法--------------");

Object.prototype.hello = function () {

    // this.constructor.name  构造器 也就是类   constructor.name 就是类的名字
    return "我是：" + this.constructor.name + "的 hello 方法";
}

var str = "aaaaaaa";
wt("str:"+str.hello());

var n = true;
wt("boolean:"+n.hello());


var n = 1;
wt(n.constructor == Number);  // Number 就是 n 实例的 构造器 也就是类

wt("----------- instanceof--判断某个对象是否是某个类的对象。------------");

var arr  = new Array();
wt(typeof arr);
wt(arr instanceof Array); // true
wt(arr instanceof Number);  // false


function cls1(){
    this.name = "cls111";
}


function cls2(){
    this.name = "cls222";
}

function com(n){
    
   if(n>0.5){
       return new cls1();
   }else{
       return new cls2();
   }
}

var n = Math.random();
var obj1 = com(n);

wt(n + "  ：  "+ (obj1 instanceof cls2));



wt("----------- 封装案例  ------------");




function func1(r){
    var pi = "3.14";
    var c = 2*pi*r;
    return c;
}
//wt(2222);
var r = 6;
wt("半径为"+r+"的圆周长为："+func1(r,3.14));