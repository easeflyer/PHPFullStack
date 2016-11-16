<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
	var bt1 = document.getElementById("bt1");
	bt1.onclick = function(){
		//创建具有兼容性的ajax对象
		var oAjax;
		if(window.XMLHttpRequest){  //ff ie9
			var oAjax = new XMLHttpRequest(); 
		}else{
			var oAjax =  new ActiveXObject("Microsoft.XMLHTTP");
		}
		oAjax.open("get","a.php?random="+Math.random()+"&id=8",true);//连接a页面
		oAjax.send(); //发送请求了
		oAjax.onreadystatechange = function(){  
			 if(oAjax.readyState==4){
			 	 if(oAjax.status==200){
				 	//alert(oAjax.responseText);
				 	document.getElementById("dv1").innerHTML  = oAjax.responseText;
				 }
			 }
		}
	}
}
</script>
<body>
<input type="button" id="bt1" value="测试ajax">
<div id="dv1">aaaaaaaaa</div>
</body>
</html>
