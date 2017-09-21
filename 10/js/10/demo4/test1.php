<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test页面1</title>
</head>

<body>
我是test页面1

<script>
function wt(str){
    document.write("<br />"+str+"<br />");
}
// 注意 opener 就是 index.php 所在窗口。
wt("我是opener的 title:"+opener.document.title);
</script>

</body>
</html>
