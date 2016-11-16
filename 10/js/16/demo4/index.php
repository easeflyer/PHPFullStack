<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="ajax.js"></script>
</head>
<script type="text/javascript">
window.onload = function(){
	var uName = document.getElementById("uName");
	uName.onchange = function(){
		//获得到用户名的值;
		var un = document.getElementById("uName").value;
		//用ajax
		ajax({
			type:"get",
			url:"check.php?random="+Math.random()+"&un="+un,
			success:function(data){
					if(data==1){
						document.getElementById("info").innerHTML = "该用户名可以注册";
					}else{
						document.getElementById("info").innerHTML = "该用户名已经存在";
					}
			}
		})
	}
}
</script>
<body>
<form action="reg.php" method="post" enctype="multipart/form-data">
	用户名<input type="text" id="uName" name="uName"><span id="info">请输入6--18位的字符</span><br />
	密码<input type="password" id="uPwd" name="uPwd"><br />
	<input type="submit" value="注册">
</form>
</body>
</html>
