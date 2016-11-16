// JavaScript Document
function wt(str){
	document.write("<br />"+str+"<br />");

}
window.onload=function(){
		var tb1 = document.getElementById("tb1");
		alert(tb1.border); //获取 边框的粗细
		// tb1.align = "center";  // 位置 居中
		// tb1.width = "1010"; // 宽度
		// tb1.cellSpacing="0" // 单元格 间距 
		// tb1.setAttribute("width","1000"); // 重新设置表格宽度。
		alert(tb1.getAttribute("width"));  // 获得表格的宽度
}