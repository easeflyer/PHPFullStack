/**
 * ppt1,ppt2 改造过程
 * 代码结构 参照 动态效果文件夹
 * 
 * css,jq 命名 按照原有命名，进行必要的增加和修改。确保css 正确。
 * 然后对 jq 代码的选择器，进行批量替换。
 * 
 */

$(document).ready(function () {


    $("#ppt1 img:eq(0)").show();
    var pptImgLength = $("#ppt1 img").length;
    $("#DD_hidden_2").val(pptImgLength - 1);
    for (var i = 0; i < pptImgLength; i++)
    {
        $("#circle").append("<li ext='" + i + "'>" + (i + 1) + "</li>");
    }

    $("#circle li").mouseover(function () {
        $("#ppt1 img").stop();
        $("#ppt1 img").css('opacity', 0).hide();

        $("#ppt2 ul").stop();
        $("#ppt2 ul").css('opacity', 0).hide();


        $("#circle li").css("backgroundColor", "#d4d4d4");

        $(this).css("backgroundColor", "#ff2832");
        //$("#ppt1 img:eq("+$(this).attr("ext")+")").fadeIn(1000);

        $("#ppt1 img:eq(" + $(this).attr("ext") + ")").animate({'opacity': 1}, 1000).show();

        $("#ppt2 ul:eq(" + $(this).attr("ext") + ")").animate({'opacity': 1}, 1000).show();

        $("#DD_hidden_1").val($(this).attr("ext"));
    });

    $("#ppt1").hover(function () {
        $("#pptpre").show();
        $("#pptnext").show();
        $("#pptpre").css("left", "-30px");
        $("#pptpre").animate({left: '0px'});

        $("#pptnext").css("right", "-30px");
        $("#pptnext").animate({right: '0px'});

        clearInterval(pptNextTimer);
    },
            function () {
                $("#pptpre").animate({left: '-30px'});
                $("#pptnext").animate({right: '-30px'});
                pptNextTimer = setInterval(pptNextFunc, 1500);
            });

    $("#pptpre").click(function () {
        //alert($("#DD_hidden_1").val());
        var currentPptIndex = $("#DD_hidden_1").val();
        currentPptIndex--;
        if (currentPptIndex < 0)
        {
            currentPptIndex = $("#DD_hidden_2").val();
        }

        $("#ppt1 img").css('opacity', 0).hide();
        $("#ppt1 img").stop();

        $("#ppt2 ul").hide();
        $("#ppt2 ul").stop();

        $("#ppt1 img:eq(" + currentPptIndex + ")").animate({'opacity': 1}, 1000).show();
        $("#ppt2 ul:eq(" + currentPptIndex + ")").fadeIn(1000);

        $("#DD_hidden_1").val(currentPptIndex);

        $("#circle li").css("backgroundColor", "#d4d4d4");

        $("#circle li:eq(" + currentPptIndex + ")").css("backgroundColor", "#ff2832");

    });


    $("#pptnext").click(function () {
        //alert($("#DD_hidden_1").val());
        var currentPptIndex = $("#DD_hidden_1").val();
        currentPptIndex++;
        if (currentPptIndex > $("#DD_hidden_2").val())
        {
            currentPptIndex = 0;
        }

        $("#ppt1 img").css('opacity', 0).hide();
        $("#ppt1 img").stop();

        $("#ppt2 ul").hide();
        $("#ppt2 ul").stop();

        $("#ppt1 img:eq(" + currentPptIndex + ")").animate({'opacity': 1}, 1000).show();
        $("#ppt2 ul:eq(" + currentPptIndex + ")").fadeIn(1000);

        $("#DD_hidden_1").val(currentPptIndex);

        $("#circle li").css("backgroundColor", "#d4d4d4");

        $("#circle li:eq(" + currentPptIndex + ")").css("backgroundColor", "#ff2832");

    });

    //clearInterval(pptNextTimer);
    var pptNextFunc = function () {
        $("#pptnext").click();
    };
    var pptNextTimer = setInterval(pptNextFunc, 1500);

    /*
     * 选项卡1  tab11
     ************************************/
    $(".firstab1 .tabindex li").hover(function () {
        $(".firstab1 .tabindex li").removeClass("cur");
        $(this).addClass("cur");
        $(".firstab1 .tabcon div").hide();
        $("#tab11_" + $(this).attr("ext")).show();
        //alert($(this).attr("ext"));
        clearInterval(time);
    }, function () {
        time = setInterval(donghua, 1500);
    })

    var index = "";

    var donghua = function () {
        if (index == "") {
            index = $(".firstab1 .tabindex li").first();
        } else {
            index = index.next();
            if (!index.is(".firstab1 .tabindex li")) {
                index = $(".firstab1 .tabindex li").first();
            }
        }
        $(".firstab1 .tabindex li").removeClass("cur");
        $(index).addClass("cur");
        $(".firstab1 .tabcon div").hide();
        $("#tab11_" + $(index).attr("ext")).show();


    }
    var time = setInterval(donghua, 1500);

/*
 * 左侧菜单
 *********************************************/

    $("#left_menu ul li").hover(function(){
	  //$(this).removeClass("menu");
	  //$(".one ul li").find(".mask").hide();
	  //$(".one ul li").find(".menu_1").hide();
	  $(this).addClass("menu");
	  $(this).find(".mask").show();
	  $(this).find(".menu_1").show();
	  
	},function(){
	  $(this).removeClass("menu").addClass("yuan");
	  $(this).find(".mask").hide();
	  $(this).find(".menu_1").hide();
	})


});
