// JavaScript Document
document.write("<br />-------全局变量--------<br />");
var a = 123;
document.write(a);

document.write("<br />-------函数外定义的变量--------<br />");
var b = 234;
function demo(){
	alert(b);
}
//demo();
document.write("<br />-------没有定义，直接赋值--------<br />");


function demo1(){
	str = "aaaaaaaaaa";
	alert(str);	
}
//demo1();
//document.write(str);  // 报错


document.write("<br />-------函数内部声明变量--------<br />");

function demo2(a1){
	var str2 = a1+"bbbbbbbb";	//只在函数内部有效
	//return str2;
}
demo2(3);
//alert(str2);//??????index.js:30 Uncaught ReferenceError: str2 is not defined
//alert(a1);  //index.js:31 Uncaught ReferenceError: a1 is not defined





document.write("<br />-------作用域链--- 内部可以访问外部-----<br />");


var color = "blue";
function changeColor() {
    var anotherColor = "red";

    function swapColors() {
        var tempColor = anotherColor;
        anotherColor = color;
        color = tempColor;
        document.write(anotherColor+"(anotherColor)<br />");

        // 这里可以访问color、anotherColor和tempColor
    }

    // 这里可以访问color、anotherColor，不能访问tempColor
    swapColors();
} 

// 这里只能访问color
changeColor();

document.write(color+ "(color)<br />");
alert(111);



