<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript" src="js/index.js"></script>
<body>
    
<form action="#" method="post" id="frm1">
	<input type="text" id="un" value="请输入用户名">
	<input type="radio" name="us" id="us" checked="checked" /> 男
	<input type="radio" name="us" id="us1" /> 女
        
	<input type="checkbox" id="cks" onclick="checkAll();">全选
	<input type="checkbox" name="ck[]">北京
            <input type="checkbox" name="ck[]" checked="checked" />上海
	<input type="checkbox" name="ck[]">天津
            
	<input type="submit" value="提交" >

	<input type="button" id="bt1" value="bt1" />
</form>
    
</body>
</html>
