// JavaScript Document
function ajax(json){ //  [name:"zhangsan",url:"a.php",success:function(){}]  json.name  json.url
		var type = json.type;  //get
		var url = json.url;
		var success = json.success;  //函数  json.success()  <==> success()
		//创建ajax对象
		var oAjax;
		if(window.XMLHttpRequest){  //ff ie9
			var oAjax = new XMLHttpRequest(); 
		}else{
			var oAjax =  new ActiveXObject("Microsoft.XMLHTTP");
		}
		oAjax.open(type,url,true);
                oAjax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8"); // post 提交的数据类型以及编码方式
		oAjax.send(json.data);
		oAjax.onreadystatechange = function(){  
					 if(oAjax.readyState==4){
						 if(oAjax.status==200){
							var data = oAjax.responseText;
							success(data);
						 }
					 }
		}	
}
		
