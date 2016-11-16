// JavaScript Document
window.onload=function(){
		var dv = document.getElementById("dv");
		alert(dv.style.color); //得到的是颜色的 rgb 三基色 值比如：rgb(255,0,0)。
		dv.style.fontSize = "64px";
		//dv.style.fontWeight = "900" // 谷歌浏览器无效，safari 有效
}