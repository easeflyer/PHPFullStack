function tab(id01,tag01,id02,tag02,id03,tag03,btn01){
	var index=0;
	var oImgtab = document.getElementById(id01);
	var aLi = oImgtab.getElementsByTagName(tag01);
	var oLine = document.getElementById(id02);
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









