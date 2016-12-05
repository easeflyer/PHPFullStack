<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script type="text/javascript">
window.onload = function(){
		// 这里需要注意， json 最外层一定是 {} 如果是 [] 则代表的是数组。
		//var str = '{"name":"zhangsan","age":18,"sex":true}';
		//var dt = {name:"zhangsan",age:100}; //json对象  ==>{"name":"zhangsan","age":100}
		var dt1 = {"name":"zhangsan","age":100};
		alert("dt1[name]:"+dt1["name"]);
		alert("dt1.name:"+dt1.name);
		var arr = [100,"lisi","nan",{"name":"zhangsan1"}];
		alert(arr[3].name); // 数组的第4个成员是一个对象。
		//数组序列化
		var arr = new Array();
		arr[0] = "zhangsan";
		arr[1] = "lisi";
		arr[2] = "wangwu";
                
                arr1 = arr;         // 引用赋值，指向同一个对象
                arr1[2] = "wangwu1"; // arr 所指向的对象，同样被修改
                
                document.write(arr[2]);
		var json = JSON.stringify(arr); //数据序列化 json
                alert("typeof(arr):"+typeof(arr));
		alert("typeof(json)"+typeof(json)); // String
		alert("json:"+json);
		//json数组的解析 变回数组
		var brr = JSON.parse(json) ;//解析json数据
		alert(brr[2]);
                
                brr[2] = "wangwu2";
                alert(arr[2]);
		
}
</script>
<body>
</body>
</html>
