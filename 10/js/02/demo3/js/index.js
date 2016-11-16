// JavaScript Document  循环的课程，适当多留一些时间 练习
document.write("<br />----------最简单的---for--------------<br />");
for (var i = 0; i <= 10; i++) {
    document.write(i + "<br />");
}
document.write("最后i的值是：" + i);


document.write("<br />-------------for 9*9--------------<br />");

for (var m = 1; m <= 9; m++) {
    for (var n = 1; n <= m; n++) {
        document.write(m + "*" + n + "=" + m * n + "&nbsp;&nbsp;");
    }
    document.write("<br />");
}
document.write("<br />-----------简单--while--------------<br />");

var y = 0;
while (y <= 10) {
    document.write(y + "<br />");
    y++; //不加步长 死循环 
}

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
        //continue; //终止当前循环，后边的循环  继续执行
    }
    document.write(k + "<br />");
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










