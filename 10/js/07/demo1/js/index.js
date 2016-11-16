// JavaScript Document
function wt(str){
    document.write("<br />"+str+"<br />");
}



function demo(){
	
}
var obj = new demo(); //实例化空对象 new 
wt("----------- typeof obj---------------");
wt(typeof obj); //弹出对象


wt("----------- Object ---------------");

function Object1(){
	wt("3333");	 
}

 var obj = new Object1(); //object js中的所有类的根类。
 wt("obj:"+obj);
 
 
 
 
 
wt("----------- {}  json 方式 文本方式---------------");
 var obj = {
     p1:"111111",
     p2:"22222",
     p3:function(){
         wt("333333333");
     }
 };
 wt(typeof obj);
 
 wt(obj.p1);
 wt(obj.p2);
 obj.p3();
wt("----------- 删除属性---------------");

delete obj.p1;
wt("ojb.p1:"+obj.p1);  // p1 属性被删除
wt("ojb.p2:"+obj.p2);

obj = null;