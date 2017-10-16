function wt(str) {
    document.write("<br />" + str + "<br />");
}
wt("----------- 定义类 或者叫 对象模板--------------");
function fun1() {
    //定义时候添加属性
    this.name = "zhangsan"; //为该类添加属性 name ,this当前对象
    this.play = function () {
         wt("斗地主");
    }
}
var obj = new fun1();

wt("obj.name:"+obj.name);
wt("obj.play:");
obj.play();

wt("----------- 空类型--------------");
function fun2() {

}

var obj2 = new fun2(); //实例化对象
obj2.name = "李四";      // 添加属性
obj2.play = function () {  // 添加方法
    wt("足球");
}

wt("obj2.name:"+obj2.name);
obj2.play();

wt("----------- json--------------");
var obj3 = {
                name: "王五", 
                play: function () {
                    wt("篮球 ")
                }
            };
wt(obj3.name);
obj3.play();
delete obj3.name; //delete obj3.say;
obj3 = null; //回收对象资源。








wt("----------- prototype - 为已有类添加新方法--------------");

String.prototype.fc1 = function () {

    return "新方法22222返回值";

}
var str = "一个字符串对象";
wt("str.fc:" + str.fc1());






wt("----------- prototype - 为所有类添加新方法--------------");

Object.prototype.hello = function () {

    return "我是：" + this.constructor.name + "的 hello 方法";
}

var str = "aaaaaaa";
wt("String:"+str.hello());

var n = true;
wt("Boolean:"+n.hello());


var n = 1;
wt("Number:"+n.hello());
wt("Number:"+n.constructor == Number);  // Number 就是 n 实例的 构造器 也就是类
