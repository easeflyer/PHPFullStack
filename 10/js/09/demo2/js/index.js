function wt(str) {
    document.write("<br />" + str + "<br />");
}

var str= "abcadecccfAghCijklmn";
wt(str.length);  // 长度
wt(str.charAt(5));  // 返回位置5的字符从0开始   e
wt(str.indexOf("d")); // 返回第一个 z 出现的位置 4
wt(str.replace("ccc","###")); // 返回替换后的结果
wt(str.substring(1,4)); // 截取字符串从位置1-4，并返回 不包含位置4 bca
wt(str.substr(1,4));    // 截取字符串 从 1 开始 截取4个字符
wt(str.toUpperCase());  // 转换大写
wt(str.toLowerCase());  // 转换小写
var str1 = "aaa#bbb#ccc#ddd";  // 分隔字符串
wt(str1.split("#") instanceof Array);  // 判断分割后 是否返回了 Array 类型数据 true
var arr = str1.split("#");
wt(arr[2]); // 返回 ccc 数组下标从0 开始




wt("----------------------------获取扩展名 --------------------------------");
var file = "demo.class.php";

arr = file.split(".");
wt("扩展名:"+arr[2]);

arr1 = file.split(".");
wt("扩展名:"+arr1[arr1.length-1]);