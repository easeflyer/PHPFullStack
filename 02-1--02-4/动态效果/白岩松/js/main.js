$(document).ready(function(){
	var shuzi = 1;
	$(".one_head_tab").mouseover(function(){
		$(".one_head_tab").addClass("bggray");
		$(this).removeClass("bggray");
		
		$(".one_body_dl").hide();
		$(".one_body_dl_"+$(this).attr("ext")).show();
		shuzi = $(this).attr("ext");
	});
	$(".one_body_dl dt").mouseover(function(){
		$(".one_body_dl_"+shuzi+" dt").show();//全部显示
		$(".one_body_dl_"+shuzi+" dd").hide();//全部隐藏
		$(this).hide();//只有这个隐藏
		$(this).next().show();//只有这个显示
	});
});
