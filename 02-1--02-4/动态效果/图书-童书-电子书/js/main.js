$(document).ready(function(){
	

	$(".tushu_left_head_tab div").mouseover(function(){
		$(".tushu_left_head_tab div").removeClass("tushu_left_head_tab_curr")
		$(this).addClass("tushu_left_head_tab_curr");
		$(".tushu_left_body").hide();
		$(".tushu_left_body_"+$(this).attr('ext')).show();
	});


	
});
