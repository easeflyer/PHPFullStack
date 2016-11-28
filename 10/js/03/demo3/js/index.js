// JavaScript Document
document.write("<br />-------回调函数--------<br />");
function func1(n1, n2) {
    document.write(n1 + n2);
}
function func2(n3, n4) {
    document.write(n3 * n4);
}
//bb(3,4); //人工调用 某种功能需求下调用的。
function demo(n5, n6, fun) {   //fun是一个回调函数,函数名称
    fun(n5, n6);//-->aa(2,2)  //调用回调函数
}


demo(2, 3, func1);  // 调用回调函数func1  函数作为参数传入
document.write("<br />");
demo(2, 3, func2);  // 调用回调函数func2  函数作为参数传入


document.write("<br />------匿名-回调函数--------<br />");

function demo1(str1, str2, fun) {
    fun(str1, str2);
}




demo1(3, 5, function (num1, num2) {
    document.write(num1 + num2);
});



 document.write("<br />------递归：  阶乘：n! = n * (n-1) * (n-2) * ...* 1(n>0)  --------<br />");

var k = 1;

function rec2(n){
    // 函数处理逻辑
    k = k * n;
    document.write(n+"*");
    n--;
    // 退出条件
    if(n==1) {document.write(1);return;}  
    // 调用自己
    rec2(n);    
}

rec2(10);
document.write("="+k);
document.write("<br />=================<br />");
//5*4*3*2*1



document.write("<br />------  递归：递减数字三角形  --------<br />");


function rec1(n){
    // 函数处理逻辑
    for(m=n;m>=1;m--){
        document.write(m+"\t");
    }
    document.write("<br />");
    // 退出条件
    if(n<1)return;
    // 调用自己
    rec1(n-1);
    
}


rec1(20);



