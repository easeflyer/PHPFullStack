// JavaScript Document
//用户名  6--18为字母 数字 _ 
// onsubmit 调用 返回 true false 
function checkInfo(){
	//验证用户名:  
	//得到用户输入的用户名 js 通过id 得到元素的。
	var userName = document.getElementById("userName").value;
	var regUn = new RegExp("^[0-9a-zA-Z_]{6,18}$");
	//regUn.test(userName)==false   ===>  !regUn.test(userName)
        
	if(regUn.test(userName)==false){
		alert("用户名必须为6-18个字符");
		return false;
	}
	var userEmail = document.getElementById("userEmail").value;
	//var regUe = new RegExp("^[0-9a-zA-Z_]{1,}@[0-9a-zA-Z_]{1,}\.(com|cn|org|net)$");  // aa@aa.com
        var regUe = /^[0-9a-zA-Z_]{1,}@[0-9a-zA-Z_]{1,}\.(com|cn|org|net)$/;      // aa@aa.com
	//regUe.test(userEmail)==false   ===>  !regUe.test(userEmail)
	if(regUe.test(userEmail)==false){
		alert("邮箱必须符合格式");
		return false;
	}
        
	return true; //onsubmit 只有 return true 提交才会被继续
}

