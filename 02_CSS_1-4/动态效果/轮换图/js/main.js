$(document).ready(function(){
	

	$(".ppt img:eq(0)").show();
	var pptImgLength = $(".ppt img").length;
	$("#DD_hidden_2").val(pptImgLength-1);
	for (var i=0;i<pptImgLength ;i++ )
	{
		$("#circle").append("<li ext='"+i+"'>"+(i+1)+"</li>");
	}

	$("#circle li").mouseover(function(){
		$(".ppt img").stop();
		$(".ppt img").css('opacity',0).hide();

		$(".ppt2 span").stop();
		$(".ppt2 span").css('opacity',0).hide();
		
		
		$("#circle li").css("backgroundColor","#d4d4d4");

		$(this).css("backgroundColor","#ff2832");
		//$(".ppt img:eq("+$(this).attr("ext")+")").fadeIn(1000);

		$(".ppt img:eq("+$(this).attr("ext")+")").animate({'opacity':1},1000).show();

		$(".ppt2 span:eq("+$(this).attr("ext")+")").animate({'opacity':1},1000).show();

		$("#DD_hidden_1").val($(this).attr("ext"));
	});

	$(".ppt").hover(function(){
		$("#pptpre").show();
		$("#pptnext").show();
		$("#pptpre").css("left","-30px");
		$("#pptpre").animate({left:'0px'});
		
		$("#pptnext").css("right","-30px");
		$("#pptnext").animate({right:'0px'});

		clearInterval(pptNextTimer);
	},
	function(){
		$("#pptpre").animate({left:'-30px'});
		$("#pptnext").animate({right:'-30px'});
		pptNextTimer = setInterval(pptNextFunc,1500);
	});

	$("#pptpre").click(function(){
		//alert($("#DD_hidden_1").val());
		var currentPptIndex = $("#DD_hidden_1").val();
		currentPptIndex--;
		if (currentPptIndex < 0)
		{
			currentPptIndex = $("#DD_hidden_2").val();
		}
		
		$(".ppt img").css('opacity',0).hide();
		$(".ppt img").stop();

		$(".ppt2 span").hide();
		$(".ppt2 span").stop();

		$(".ppt img:eq("+currentPptIndex+")").animate({'opacity':1},1000).show();
		$(".ppt2 span:eq("+currentPptIndex+")").fadeIn(1000);
		
		$("#DD_hidden_1").val(currentPptIndex);

		$("#circle li").css("backgroundColor","#d4d4d4");

		$("#circle li:eq("+currentPptIndex+")").css("backgroundColor","#ff2832");

	});


	$("#pptnext").click(function(){
		//alert($("#DD_hidden_1").val());
		var currentPptIndex = $("#DD_hidden_1").val();
		currentPptIndex++;
		if (currentPptIndex > $("#DD_hidden_2").val())
		{
			currentPptIndex = 0;
		}
		
		$(".ppt img").css('opacity',0).hide();
		$(".ppt img").stop();

		$(".ppt2 span").hide();
		$(".ppt2 span").stop();

		$(".ppt img:eq("+currentPptIndex+")").animate({'opacity':1},1000).show();
		$(".ppt2 span:eq("+currentPptIndex+")").fadeIn(1000);
		
		$("#DD_hidden_1").val(currentPptIndex);

		$("#circle li").css("backgroundColor","#d4d4d4");

		$("#circle li:eq("+currentPptIndex+")").css("backgroundColor","#ff2832");

	});
	
	//clearInterval(pptNextTimer);
	var pptNextFunc = function(){
		$("#pptnext").click();
	};
	var pptNextTimer = setInterval(pptNextFunc,1500);	
});
