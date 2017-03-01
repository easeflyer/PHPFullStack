// JavaScript Document
document.write("<br />-------------if else--------------<br />");
var wea = "雾天";

if(wea == "晴天"){
    document.write(wea + ":");
}else{
    document.write("其他天气:");  
}

if (wea == "阴天") {   //晴天 == 阴天  false 
    document.write("游泳");
} else if (wea == "雪天") {//晴天 == 雪天  false 
    document.write("兜风");
} else if (wea == "雾天") {//晴天 == 雾天  false 
    document.write("户外活动");
} else {  ///晴天 和以上条件都比较   false 
    document.write("跑步");
}
document.write("<br />-------------if else--end------------<br />");

if (wea != "白天") {
    document.write("<br />睡觉");
}

document.write("<br />-------------switch--------------<br />");

var wea1 = "雪天";


// 注意 break
switch (wea1) {
    case "阴天":
        document.write("游泳");
        break;
    case "雪天":
        document.write("兜风");
        break;
    case "雾天":
        document.write("户外活动");
        break;
    default:
        document.write("睡觉");
        break;
}













