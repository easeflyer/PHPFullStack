function Tabp(btnId,btnTag,listId,listTag,titleStyle){
	var oBtn=document.getElementById(btnId);
	if(!oBtn){
		return false;
	}
	var aBtn=oBtn.getElementsByTagName(btnTag);
	var oList=document.getElementById(listId);
	//var aList=oList.getElementsByTagName(listTag);
	var aList=getChild(oList,listTag)
	
	function getChild(obj,tag){
		var arr=[];
		var aTags=obj.getElementsByTagName(tag);
		for(var i=0;i<aTags.length;i++){
			if(aTags[i].nodeType==1){
				arr.push(aTags[i]);
			}
		}

		for(var i=0;i<arr.length;i++){
			var _div=arr[i].getElementsByTagName(tag);
			if(_div.length>0){
				arr.splice(i+1,_div.length);
			}
		}
		return arr;


	}


	for(var i=0;i<aBtn.length;i++)
	{
		aBtn[i].index=i;
		aBtn[i].onmouseover=function ()
		{
			for(j=0;j<aBtn.length;j++)
			{
				aBtn[j].className='';
				aList[j].style.display="none";
			}
			this.className=titleStyle;
			aList[this.index].style.display="block";

		}
	}
}


function Tabp2(btnId,btnTag,listId,listTag,titleStyle){
	var oBtn=document.getElementById(btnId);
	if(!oBtn){
		return false;
	}
	var aBtn=oBtn.getElementsByTagName(btnTag);
	var oList=document.getElementById(listId);
	var aList = getElementsByClassName(listTag, {parentObj : listId } );
	//alert(aList.length);

	function getElementsByClassName(className,term){
		var parentEle=null;
		if(term.parentObj){ parentEle = typeof term.parentObj=='string'
		? document.getElementById(term.parentObj) : term.parentObj;}
		var rt = [],coll= (parentEle==null?document:parentEle).getElementsByTagName(term.tagName||'*');
		for(var i=0;i<coll.length;i++){
			if(coll[i].className.match(new RegExp('(\\s|^)'+className+'(\\s|$)'))){
				rt[rt.length]=coll[i];
			}
		}
		return rt;
	}
	for(var i=0;i<aBtn.length;i++)
	{
		aBtn[i].index=i;
		aBtn[i].onmouseover=function ()
		{
			for(j=0;j<aBtn.length;j++)
			{
				aBtn[j].className='';
				aList[j].style.display="none";
			}
			this.className=titleStyle;
			aList[this.index].style.display="block";

		}
	}
}


