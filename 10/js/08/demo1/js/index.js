/**


 */


function func2(str1){
    return "str1的输出："+str1;
}

document.write(func2(22222));

function wt(str){
    document.write("<br />"+str+"<br />");
    
}

var ren = {};
ren.name = "lisi1";
ren.age = 18;
ren.fun1 = function(){
	wt("11111111111");
}
// 使得不同的 工种 的分工协作成为可能。
// 使得 复杂问题 简单化。
function  func1(n){
    
    
}


//var ren2; 

//以前 ren.name;
//alert(ren["name"]);  // 这样也可以
for(var i in ren){ //遍历数组 --》遍历对象。  遍历任何对象并且输出
	wt(i);	 // 弹出的属性+方法名称  (下标，名称)
	wt(ren[i]);  //输出了所有的属性和方法。（值）
}



