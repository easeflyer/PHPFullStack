<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
/*
 * get 方式 ajax 基本案例，把返回数据插入 div
 * 
 */
    
    
window.onload = function(){
	var bt1 = document.getElementById("bt1");
	bt1.onclick = function(){
		//var obj = new XMLHttpRequest(); 
		//var obj = new ActiveXObject("Microsoft.XMLHTTP");
		//alert(obj);
                
                
		//创建具有兼容性的ajax对象
                
                
		var oAjax;
		if(window.XMLHttpRequest){  //ff ie9
			var oAjax = new XMLHttpRequest(); 
		}else{
			var oAjax =  new ActiveXObject("Microsoft.XMLHTTP");
		}
                
                // ajax 有缓存  在open中的url上绑定一个随机数。因为 url 发生了变化，因此避免了缓存。
                //http://localhost/a.php?a=1&b=2&c=3
		oAjax.open("get","a.php?random="+Math.random(),true);//连接a页面   true 采用异步方式发送请求 其他元素不会等待。
		oAjax.send(); //发送请求了
		oAjax.onreadystatechange = function(){   // on readystate change  当 readystate 发生变化时执行
			 if(oAjax.readyState==4){        // 4 数据接收完成。
			 	 if(oAjax.status==200){
                                        // responseText; 从服务器返回的数据。纯文本格式。
				 	// alert(oAjax.responseText);
                                        // 在下面的 dv1 插入返回的数据
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
