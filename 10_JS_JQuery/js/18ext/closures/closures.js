// closures 闭包
/*
简单说，闭包就是一个函数A内部的函数B，他B可以访问函数A的局部变量，然后函数B被返回给 函数A的外部，因此在外部
就可以通过函数B访问到函数A的内部变量。 这个函数B就是闭包。
 */


document.write("<br />------------------------demo1---------------------------<br />");

var add = new function(){

	var count = 0;

	return function(){
		return count++;
	}
}


/**
 * 注释：
 * 这里 add() 仅仅是 一个返回的内部函数的引用。
 * 但关键是：add() 这个函数 可以访问到 上级作用域 中的 count 计数器变量，且只能由add() 访问到。
 */
document.write(add()+"<br />");
document.write(add()+"<br />");
document.write(add()+"<br />");

document.write("<br />------------------------demo2---------------------------<br />");



function fun1(){

	var count = 0;

	return function (){
		return count++;
	}
}


var add = fun1(); // 调用一次 fun1

document.write(add()+"<br />");
document.write(add()+"<br />");
document.write(add()+"<br />");

document.write(fun1()+"<br />");
document.write(fun1()+"<br />");
document.write(fun1()+"<br />");

document.write(fun1()()+"<br />");
document.write(fun1()()+"<br />");
document.write(fun1()()+"<br />");




　　var name = "The Window";
　　var object = {
　　　　name : "My Object",
　　　　getNameFunc : function(){
			alert("1:"+this.name);
　　　　　　return function(){
　　　　　　　　return "2:"+this.name;
　　　　　　};
　　　　}
　　};
　　//alert(object.getNameFunc()());
	var test = object.getNameFunc();
	alert(test());
	






　　var name = "The Window";
　　var object = {
　　　　name : "My Object",
　　　　getNameFunc : function(){
　　　　　　var that = this;
　　　　　　return function(){
　　　　　　　　return that.name;
　　　　　　};
　　　　}
　　};
　　alert(object.getNameFunc()());