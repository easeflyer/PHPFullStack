<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
	var one = document.getElementById("one");
	one.onclick = function(){
		window.location = "http://www.baidu.com";
	}
}
</script>
    
    
    
<body>
        <input type="button" value="跳转" id="one" />
        <input type="text" value="" id="two" />
        <input type="button" value="刷新" onclick="window.location.reload()" />
        
        
<script>
function wt(str){
    document.write("<br />"+str+"<br />");
}
wt("screen.height"+screen.height);
wt("screen.width"+screen.width);
wt("screen.availheight"+screen.availHeight);
wt("screen.availwidth"+screen.availWidth);
</script>
        
</body>
</html>
