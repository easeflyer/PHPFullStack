<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
    /*
     * post 方式发送参数 并且返回发送测参数
     */
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
		//用post传值
		oAjax.open("POST","a.php?random="+Math.random(),true);//连接a页面
		//setRequestHeader();
		oAjax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
		oAjax.send("id="+3+"&name=zhangsanfeng");            //发送请求了 post 方式这样传递变量。
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
