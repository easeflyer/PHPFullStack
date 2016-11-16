// JavaScript Document
function wt(str){
    document.write("<br />"+str+"<br />");
}
wt("---------------screenLeft-------screenTop----------------");
wt(window.screenLeft); //获得浏览器距离屏幕左上角的左边距
wt(window.screenTop); //获得浏览器距离屏幕左上角的上边距

wt("---------------screenX-------screenY----------------");  // 移动窗口位置
wt(window.screenX); //获得浏览器距离屏幕左上角的左边距 FireFox 浏览器
wt(window.screenY); //获得浏览器距离屏幕左上角的上边距

wt("---------------clientHeight-------clientWidth----------------");  // 调整浏览器窗口大小
wt(document.documentElement.clientHeight); //浏览器窗口的高
wt(document.documentElement.clientWidth); //浏览器窗口的宽



