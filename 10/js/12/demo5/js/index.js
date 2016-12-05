// JavaScript Document
window.onload=function(){
	//文本框 操作
	var un = document.getElementById("un");
	// 获得焦点 点击或者 tab 键切换到  文本框置空
	un.onfocus = function(){
			this.value= "";
	}
	un.onblur = function(){
            if(this.value==""){
                this.value= "请输入用户名！";
             }
	}
	var frm1 = document.getElementById("frm1");
	frm1.onsubmit = function(){
		var un = document.getElementById("un").value;
		alert(un);
		//得到焦点的时候 文本框中的文字应该是空的。
	}



        //  表单对象 .elements[下标]  下标从  0 开始
        
        
	//var bt1 = document.getElementById("bt1");
	// 通过 elements[] 获得元素对象
	bt1.onclick = function(){
		alert(frm1.elements[2].id);
	}
	
	//复选框的全选


}



	function checkAll(){
		var cks = document.getElementById("cks");
		//获得所有的checkbox的元素。  用 ck[] 作为 name 属性因为 php 也可以获得这个属性数组。
		var ck = document.getElementsByName("ck[]");  // 获得集合
		for(var i=0;i<ck.length;i++){
                        //alert(cks.checked);
			ck[i].checked = cks.checked;
			//ck[i].checked = true;  // 等同于以上语句
		}
	}

