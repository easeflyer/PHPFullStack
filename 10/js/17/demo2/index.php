<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
</style>
<script type="text/javascript">
	
		function sAlert(str){
			//1 创建了遮罩层
			var bgObj = document.createElement("div");
			bgObj.id = "bgDiv";
			bgObj.style.background = "#777";
			bgObj.style.width=document.body.offsetWidth+"px";
			bgObj.style.height = screen.height+"px";
			bgObj.style.opacity = "0.1"; // ie9  ff   
			//ie 6 7 8  bgObj.style.filter = "progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75)";  
			bgObj.style.position="absolute";
			bgObj.style.top = "0";
			bgObj.style.left = "0";
			bgObj.style.zIndex = 1000;
			document.body.appendChild(bgObj);
			//创建消息对话框
			var mObj = document.createElement("div");
			mObj.id = "mDiv";
			mObj.style.background = "#ffffff";
			mObj.style.border = "1px solid #ff0000";
			mObj.style.width="400px";
			mObj.style.height = "100px";
			mObj.style.position="absolute";
			mObj.style.top = "35%";
			mObj.style.left = "35%";
			mObj.style.zIndex = 1001;
			document.body.appendChild(mObj);
			// 添加消息层
			var title = document.createElement("h4");
			title.id = "msgTItle";
			title.align = "right";
			title.style.margin = "0";
			title.style.background = "#ffffff";
			title.innerHTML = "关闭";
			title.style.border = "1px solid #00ff00";
			title.onclick = function(){
				document.body.removeChild(bgObj);
				mObj.removeChild(title);
				document.body.removeChild(mObj);
			}
			mObj.appendChild(title);
			//放置元素 对话信息框中添加了元素。
			var pInfo = document.createElement("p");
			pInfo.innerHTML = "<input type='text' name='uName'>"; //表单内容
			mObj.appendChild(pInfo);
		}

</script>
<body>
<a href="http://www.baidu.com">baidu</a>
<input type="button" value="点击" onclick="sAlert('测试弹出层并且加上锁频效果')">
</body>
</html>
