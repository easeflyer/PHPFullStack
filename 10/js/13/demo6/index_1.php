<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
	//1 获取 bt
	var bt = document.getElementById("bt");
	bt.onclick = function(){
		 //2 创建div
		 var divs = document.createElement("div");
		 divs.style.width="500px";
		 divs.style.height="350px";
		 divs.style.border = "2px solid #ff0000";
		 divs.style.position = "absolute";
		 divs.style.top = "100px";
		 divs.style.left = "300px";
		 // 模拟右上角的 关闭按钮
                 var dv = document.createElement("div");
                 dv.style.width="50px";
                 dv.style.height="20px";
                 dv.style.border = "1px solid #00ff00";
                 dv.style.float = "right";
                 dv.innerHTML = "X";
		 divs.appendChild(dv);
		 
		 //3 div添加 到body
		document.body.appendChild(divs);	   // 在 bt 按钮之后；body的最后插入对象。
		//document.body.insertBefore(divs,bt);     // 在 bt 按钮之前插入对象	 
		//var dv = document.getElementById("dv");
		dv.onclick = function(){
			document.body.removeChild(divs);    // 删除子对象。
			divs = null;                        // 内存中销毁子对象
                        dv = null;
		}
	}
}
</script>
<body>
<input type="button" value="登录" id="bt">
</body>
</html>
