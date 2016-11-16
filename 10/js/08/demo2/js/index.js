function wt(str) {
    document.write("<br />" + str + "<br />");
}
wt("----------------------------封装-在内部定义类-返回给外部----------------------------------");
// 在内部 定义对象模板 封装
function com(color, size) { //电脑
    //实例化过程写方法内部:  那么程序内部的逻辑不同，可以使得 com 对象发生变化。
    var cm = {}; //json方法实例化。
    cm.color = color;
    cm.size = size;
    cm.play = function () {
        alert("斗地主");
    }
    return cm; //返回时电脑的对象
}
var sony = com("红色", "21");
wt(sony.color);
sony.play();
wt("------------------------直接定义类----------------------------------------");
function cm1(color, size) {
    this.color = color;
    this.size = size;
    this.play = function () {
        alert("踢足球");
    }
}
var acer = new cm1("绿色", "18");
//alert(acer.size);
acer.play();

wt("------------------------用 prototype 扩展类的属性和方法----------------------------------------");
function cm(color, size) {
    this.color = color;  //this代表当前对象
    this.size = size;
}
cm.prototype.play = function () { //外部添加的方法。 prototype:返回了对象的原型。
    alert("打篮球");
}
var dell = new cm("蓝色", 25);
//alert(dell.size);
dell.play();
























