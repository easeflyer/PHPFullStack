<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
	var divs = null; //声明空元素
	var bt = document.getElementById("bt");
	bt.onclick = function(){
		//定义弹出div --》
		divs = document.createElement("div");
		divs.style.width = "500px";
		divs.style.height = "300px";
		divs.style.border = "5px solid #ff0000";
		// 设置 div 的位置
		divs.style.position = "absolute"; // 位置 按照 绝对定位方式
		divs.style.top  = "100px";
		divs.style.left = "300px";
		// 追加 div 节点 这里 div 才会显示出来
		document.body.appendChild(divs);
		var inbt = document.createElement("a");
		inbt.innerHTML = "X";
		inbt.style.float = "right"; // 位置在右上角
		divs.appendChild(inbt);
		inbt.onclick = function(){
			document.body.removeChild(divs); // 移除 divs
			divs = null; // 清空内存 不清空也没关系，浏览器会自动回收。
		}
	}
}
</script>
<body>
<input type="button" id="bt" value="登陆">
</body>
</html>
