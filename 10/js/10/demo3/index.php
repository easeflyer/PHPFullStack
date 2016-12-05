<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
    function resizeWindow(){
	resizeTo(500,500);  // ie 支持 谷歌不支持
    }
	window.onload =function(){
		 var i=1;
		 id = setInterval(changeTime,2000);
		 //setTimeout(changeTime,1000);
		 function changeTime(){
		 	alert(i) //每隔1秒钟 弹出窗口。
			i++;
                        if(i>5)clearInterval(id);   // 停止
		 }
	}
</script>
<body>
    
    <input type="button" onclick="resizeWindow()" value="Resize window" />
    
</body>
</html>
