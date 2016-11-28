function wt(str) {
    document.write("<br />" + str + "<br />");
}


wt("--------------------------Math---------------------------------");
var n = -5;
wt("Math.abs(n):"+Math.abs(n));    // 绝对值
var m = 3.54;
wt("Math.round(m):"+Math.round(m)); //四舍五入
var t = 3.94;
wt("Math.floor(t):"+Math.floor(t)); // 取整 去掉小数
wt("Math.random():"+Math.random()); // 随机数  每次刷新值不同
wt("Math.max:"+Math.max(1, 8, 12, 35, 22));  // 最大值


wt("--------------------------遍历输出 所有全局 函数和属性---------------------------------");

// 遍历输出 所有全局 函数和属性
for (var name in this)
{
//variables += name + "<br />";
    document.write(name + "<br />");
}


// this 就是 window
alert(this === window);

// 控制台的使用 用于程序的调试 点击浏览器的检查可见
console.log("333"); 
console.log("444"); 
console.log(555);
console.log(wt);