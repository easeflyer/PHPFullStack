<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
我是top


<script>
function wt(str){
    document.write("<br />"+str+"<br />");
}
wt(top.v1); // 调用 index.php 定义 v1 变量
wt(top.document.title) // 调用其他文档对象模型 具体有哪些大家参考手册

/*  遍历 parent 和 top
for(var i in parent){ //遍历数组 --》遍历对象。  遍历任何对象并且输出
	//wt(i);	 // 弹出的属性+方法名称  (下标，名称)
	wt(i+"::::::::::::::::"+top[i]);  //输出了所有的属性和方法。（值）
}
*/
</script>
</body>
</html>
