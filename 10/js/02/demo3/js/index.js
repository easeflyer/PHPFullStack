// JavaScript Document  循环的课程，适当多留一些时间 练习
document.write("<br />----------最简单的---for--------------<br />");

// var i = 0;
for (var i = 0; i <= 10; i++) {
    document.write(i+"   重复这条语句<br />");
    // i++;
}

document.write("最后i的值是：" + i);


document.write("<br />-------------for 9*9--------------<br />");

for (var m = 1; m <= 9; m++) {
    // m = 1,2,3

    for (var n = 1; n <= m; n++) {
        // n = 1,2;

        document.write(m + "*" + n + "=" + m * n + "&nbsp;&nbsp;");
        // 1*1=1 
        // 2*1=2  2*2=4 
        // 3*1=3
    }

    document.write("<br />");
}


document.write("<br />-----------简单--while--------------<br />");

var y = 0;
while (y <= 15) {
    document.write(y + "<br />");
    y++; //不加步长 死循环 
}
document.write("最后y的值:" + y);
document.write("<br />-------------while--9*9------------<br />");
var s = 1;
while (s <= 9) {
    var t = 1;
    while (t <= s) {
        document.write(s + "*" + t + "=" + s * t + "&nbsp;&nbsp;");
        t++;
    }
    document.write("<br />");
    s++;
}

document.write("<br />-------------do...while--------------<br />");
var h = 0;
do {
    document.write(h + "<br />");
    h++;
} while (h <= 10);
document.write("<br />-------------do...while--------------<br />");

var j = 38;
do {
    document.write(j);
    j++;
} while (j <= 10);



document.write("<br />-------------break--------------<br />");
for (var k = 1; k <= 8; k++) {
    if (k == 4) {
        break;	 //终止当前的语句块。作用：跳出且终止循环，继续 执行后边的代码
        //continue;        //终止当前循环，后边的循环  继续执行
    }
    document.write(k + "<br />");

    //document.write("aaaaa");
    //1
    //2
    //3
    //5
    //6
}

document.write("循环后的语句");

document.write("<br />-------------with--------------<br />");
//document.write("aaaa<br />");
//document.write("bbbbb<br />");
//document.write("cccc<br />");
with (document) {
    write("111111111<br />");
    write("222222222<br />");
    write("3333333333<br />");
}

document.write("<br />-------------with2--------------<br />");
var userName = "zhangsan";
with (document) {
    userName = "lisi";
    write(userName);
}







document.write("<br />-------------do while--------------<br />");
var m = 9;

do {
    var n = 1;
    do {
        document.write(m + "*" + n + "=" + m * n + "&nbsp;&nbsp;");
        n++;
    } while (n <= m);
    document.write("<br />");
    m--;
} while (m >= 1);
document.write("<br />====求素数===================================================<br />");
//document.write(m + "*" + n + "=" + m * n + "&nbsp;&nbsp;");
/*求素数*/
var max = 10000;
var i = 3,s=0;  // i 尝试的数字        16   
while (i < max) {
    s = 0;
    for (var m = 2; m <= i / 2; m++) {  // m 尝试的因数
        if ((i % m) == 0) {
            s=1;
            break;
        }
    }
    if(s==0) document.write("["+i+"]　");
    i++;
}

document.write("<br />====输出 星星===================================================<br />");


for(var i = 1;i<10;i++){
    // 输出空格
    for(j = 50-i*1;j>0;j--){
        document.write("　");
    }
    // 输出星星
    for(k = 1;k<=i;k++){
        document.write("　*");
    }
    document.write("<br />");
}