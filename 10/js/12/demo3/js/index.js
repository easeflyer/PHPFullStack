// JavaScript Document
window.onload=function(){
	var bt = document.getElementById("bt");
	bt.onclick = function(){
		var dv = document.getElementById("dv");
		dv.className = "demo"; // 替换样式
	}

	bt1.onclick = function(){
		dv = document.getElementById("dv1");
		alert(dv.innerHTML);  // 显示dv1 的内容
		var dv = document.getElementById("dv");
		dv.id = "dv1";      // 把 dv 的id 修改为 dv1

		dv = document.getElementById("dv1");
		alert(dv.innerHTML);
	}
}