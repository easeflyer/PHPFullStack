function wt(str){
    document.write("<br />"+str+"<br />");
}

wt("----------- prototype - 为所有类添加新方法--------------");

Object.prototype.hello = function () {

    // this.constructor.name  构造器 也就是类   constructor.name 就是类的名字
    return "我是：" + this.constructor.name + "的 hello 方法";
}

var str = "aaaaaaa";
wt(str.hello());

var n = true;
wt(n.hello());


var n = 1;
wt(n.constructor == Number);  // Number 就是 n 实例的 构造器 也就是类

wt("----------- instanceof--判断某个对象是否是某个类的对象。------------");

var arr  = new Array();
wt(typeof arr);
wt(arr instanceof Array); // true
wt(arr instanceof wt);  // false


