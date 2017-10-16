<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正则表达式</title>
<script type="text/javascript" src="js/index.js"></script>
</head>

<body>
<?PHP
if($_POST){echo "提交成功<br />";}
?>
<!-- 注意这里 onsubmit 只有为true才会提交，false不提交 -->
<form action="" method="post" onsubmit="return checkInfo();">
	用户名<input type="text" id="userName" name="userName" value="请输入用户名" /> <br />
	密码<input type="password" name="userPwd" id="userPwd" /> <br />
	邮箱<input type="text" name="userEmail" id="userEmail" /> <br />
	手机号<input type="text" name="userTel" id="userTel" /> <br />
	<input type="submit" value="提交" />
</form>
</body>
</html>
