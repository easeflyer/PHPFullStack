$(document).ready(function(){
	

	$(".float_left_s").hover(function(){
		$('.float_left_s_'+$(this).attr('ext')+'_div').show();
	},
	function(){
		$('.float_left_s_'+$(this).attr('ext')+'_div').hide();
	});

	$(".float_left_s").click(function(){

		var top = $("#floor_l_head"+$(this).attr('ext')).position().top;
		$('html,body').animate({scrollTop:top},100);
	});

	$(window).scroll(function(){
		if ($(window).scrollTop() > 200)
		{
			
			$(".float_left").addClass("transform1");
			$(".float_left").removeClass("transform2");
		}else
		{
			//$(".float_left").hide();
			$(".float_left").removeClass("transform1");
			$(".float_left").addClass("transform2");
		}
	});


	
});
