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
		window.top.frames[2].history.forward(); //没加() 
		//window 当前窗口   window.top   top.php父对象 --》index---》frames【2】 right
	}
		var two = document.getElementById("two");
	two.onclick = function(){
		window.top.frames[2].history.back(); //没加() 
		//window 当前窗口   window.top   top.php父对象 --》index---》frames【2】 right
	}

}
</script>
<body>
<input type="button" value="前进" id="one" />
<input type="button" value="后退" id="two" />
top 包含js 代码<br />
<script>
function wt(str){
    document.write("<br />"+str+"<br />");
}
// 从这里可以看到每个框架的编号。
wt("[0]:"+window.top.frames[0].name); //top
wt("[1]:"+window.top.frames[1].name); //left
wt("[2]:"+window.top.frames[2].name); // right
wt("[3]:"+window.top.frames[3].name); // 没有。
</script>

</body>
</html>
