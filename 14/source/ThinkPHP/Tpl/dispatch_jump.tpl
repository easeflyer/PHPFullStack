<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<include file="Common:miniheader"/>
</head>
<body>
<script type="text/javascript">
	var _msg='{$message}';
	var _msg1='{$error}';
	var _jumpurl='{$jumpUrl}';
	$(function(){
		if(_msg){
		$.messager.alert('提示',_msg,'info',function(){
			if(_jumpurl){
			window.location.href=_jumpurl
			}else{
			window.history.go(-1);
			}
		}); 
		}
		if(_msg1){
		$.messager.alert('提示',_msg1,'info',function(){
			if(_jumpurl){
			window.location.href=_jumpurl
			}else{
			window.history.go(-1);
			}
		}); 
		} 
	})
</script>
</body>
</html>