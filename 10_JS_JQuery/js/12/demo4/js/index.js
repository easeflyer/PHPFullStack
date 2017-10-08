// JavaScript Document
window.onload=function(){
	var frm1 = document.getElementById("frm1"); // 获得表单对象
	// 表单提交时 触发此过程函数
	frm1.onsubmit = function(){
		var un = document.getElementById("uname").value;
		alert(un);
	}
	

}