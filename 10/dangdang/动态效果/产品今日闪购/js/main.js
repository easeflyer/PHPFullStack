$(document).ready(function(){
	$(".switchP li").hover(function(){
		$(".sg_body ul").hide();
		$(".sg_body_"+$(this).attr('ext')).show();		
		$(".switchP li").css('backgroundPosition','-67px -545px');
		$(this).css('backgroundPosition','-82px -545px');
		currentDom3 = $(this);
		clearInterval(switchPTimer);
	},function(){
		switchPTimer = setInterval(switchPFunc,1500);
	});
	var currentDom3 = '';
	var switchPFunc = function(){
		if (currentDom3 == '')
		{
			currentDom3 = $(".switchP li").first();
		}else
		{
			currentDom3 = currentDom3.next();
			if (!currentDom3.is(".switchP li"))
			{
				currentDom3 = $(".switchP li").first();
			}
		}
		$(".sg_body ul").hide();
		$(".sg_body_"+$(currentDom3).attr('ext')).show();

		$(".switchP li").css('backgroundPosition','-67px -545px');

		$(currentDom3).css('backgroundPosition','-82px -545px');
	};

	var switchPTimer = setInterval(switchPFunc,1500);	
});
