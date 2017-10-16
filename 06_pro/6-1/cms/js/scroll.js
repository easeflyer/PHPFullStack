/** 参考 上面的代码
 * 
 * id01     图片列表
 * tag01    图片列表 用的标签名称 li
 * 
 * id02     文本列表
 * tag02    文本列表 用的标签名称 h4
 * 
 * id03     数字按钮列表
 * tag03    数字按钮 用的标签名称 span
 * 
 * btn01    数字按钮选中状态的样式
 */

function tab(id01,tag01,id02,tag02,id03,tag03,btn01){
	var index=0;
	var oImgtab = document.getElementById(id01);    // 图片 ul 列表
	var aLi = oImgtab.getElementsByTagName(tag01);   // 图片 li 集合
	var oLine = document.getElementById(id02);       // 文本 div 列表
	var oTitle = oLine.getElementsByTagName(tag02);
	var oButton = document.getElementById(id03);
	var aSpans = oButton.getElementsByTagName(tag03);
	var remark = 1,timer = null,gap=30,len = aLi.length,now;
	//计时器
	function startMove(abc) {
			if(timer)clearInterval(timer);
			   timer = setInterval(function(){
				  gotoIndex(index);
				  doMove(abc);
				},gap);
	}
	start();
	function start() {
		   T = setInterval(function(){ //这里换成了setInterval，动画不要用setTimerout，不好控制
				index+=1;
			   if(index==len) {index =0;}
			   startMove(index);
			},4000);
	}
	for(var i=0;i<len;i++) {
		aSpans[i].oIndex=i;
	   aSpans[i].onmouseover =function(){index=this.oIndex;gotoIndex(this.oIndex);startMove(this.oIndex);};
	}
	function doMove(abc)
	{
		//gotoIndex();
		var liHeight=aLi[0].offsetWidth;
		now =oImgtab.offsetLeft;
		iSpeed=(-(liHeight*abc)-now)/5;
		iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
		oImgtab.style.left=now+iSpeed+"px";
	}
	function gotoIndex(rema) {
	   for(var i=0;i<len;i++) {
			aSpans[i].className = '';
			oTitle[i].style.display = 'none';   
	   }
			aSpans[rema].className = btn01;
			oTitle[rema].style.display = 'block';
	}
	//扩展为可控

	oImgtab.onmouseover = function(){
			clearInterval(T);
		};
	oImgtab.onmouseout = function(){
			start();
	};

};

function tab2(id01,tag01){
	var index=0;
	var oImgtab = document.getElementById(id01);
	var aLi = oImgtab.getElementsByTagName(tag01);
	var remark = 1,timer = null,gap=30,len = aLi.length,now;
	//计时器
	function startMove(abc) {
			if(timer)clearInterval(timer);
			   timer = setInterval(function(){
				  doMove(abc);
				},gap);
	}
	start();
	function start() {
		   T = setInterval(function(){ 
				index+=1;
			   if(index==len) {index =0;}
			   startMove(index);
			},3000);
	}
	function doMove(abc)
	{
		//gotoIndex();
		var liHeight=aLi[0].offsetWidth;
		now =oImgtab.offsetLeft;
		iSpeed=(-(liHeight*abc)-now)/5;
		iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
		oImgtab.style.left=now+iSpeed+"px";
	}
	oImgtab.onmouseover = function(){
			clearInterval(T);
		};
	oImgtab.onmouseout = function(){
			start();
	};

};









