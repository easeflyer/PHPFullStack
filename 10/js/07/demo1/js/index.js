// JavaScript Document
function wt(str){
    document.write("<br />"+str+"<br />");
}



function demo(){
    
}
function demo1(){
    this.p1 = "p1属性值<br />";
    this.p2 = "p2属性值<br />";
    this.func1 = function(){
        return "func1方法的返回值<br />";
    }
}
var obj1 = new demo1();

document.write(obj1.p1);
document.write(obj1.p2);
document.write(obj1.func1());

var obj = new demo(); //实例化空对象 new 
wt("----------- typeof obj---------------");
wt(typeof obj); // 输出对象


wt("----------- Object ---------------");

function Object1(){
	wt("3333");
}

 var obj = new Object1(); 
 wt("obj:"+obj);
 
 
 
 
wt("----------- {}  json 方式 文本方式---------------");
function Obj1(){
    this.p1 = "111111";
    this.p2 = "22222";
    this.p3 = function(){
        wt("333333");
    }
}

var obj1 = new Obj1();



 var obj = {
     p1:"1112111",
     p2:"223222",
     p3:function(){
         wt("333333333");
     }
 };
 wt("typeof:"+typeof obj);
 
 wt(obj.p1);
 wt(obj.p2);
 obj.p3();
 
 
 
wt("----------- 删除属性---------------");

delete obj.p1;   // delete 关键词 可以用于删除属性
wt("ojb.p1:"+obj.p1);  // p1 属性被删除
wt("ojb.p2:"+obj.p2);

obj = null;  // 销毁对象。