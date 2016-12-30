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

        //$("#ppt1 img").css('opacity', 0).hide();
        $("#ppt1 img").hide();
        $("#ppt1 img").stop();

        $("#ppt2 ul").hide();
        $("#ppt2 ul").stop();

        //$("#ppt1 img:eq(" + currentPptIndex + ")").animate({'opacity': 1}, 1000).show();
        $("#ppt1 img:eq(" + currentPptIndex + ")").fadeIn(1000).show();
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
     * 手机当当 动态部分
     ************************************/


    $("#m_dangdang").hover(function () {
        //alert(333);
        $("#m_dangdang").attr("class", "active");
        $(".topnav li .mask").show();
        $(".topnav li .two").show();
    }, function () {
        $("#m_dangdang").removeClass("active");
        $(".topnav li .mask").hide();
        $(".topnav li .two").hide();
    });





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
            if (!index.is(".firstab1 .tabindex li")) { // 如果超出范围，则恢复到第一个选项卡。
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
     * 首屏右侧 选项卡2
     * 
     * .firstab2 最外层容器
     * ul.tabindex  头部切换的选项卡标题
     * li.cur 选中状态
     * 
     * div.tabcon   选项卡内容容器
     *      div.tabcontent  单独的内容
     *      
     * 思路：cTb 函数 change Tab 根据 tb2 编号。切换选项卡。 tb2 自动增加
     *      切换过程：所有的都取消 cur 状态，只有编号为 tb2 的 显示出来，
     *      同时 内容部分 也显示出来。
     *********************************************/

     var tb2 = 1;
     var cTb = function(){
         if(tb2 > 3) tb2 = 1;
         $(".firstab2 ul li").removeClass("cur");
         $(".firstab2 ul li[ext=" + tb2 + "]").addClass("cur");
         $(".firstab2 div.tabcontent").hide();
         $("#tb_"+tb2).show();
         tb2++;
     }
     var time1 = setInterval(cTb,1500);

    /*
     * 首屏右侧 选项卡2 手动切换
     */
    $(".firstab2 ul li").hover(function(){
         $(".firstab2 ul li").removeClass("cur");
         $(this).addClass("cur");
         $(".firstab2 div.tabcontent").hide();
         $("#tb_"+ $(this).attr("ext")  ).show();
         clearInterval(time1);
    },function(){
        time1 = setInterval(cTb,1500);
    });
    

    /*
     * 左侧菜单
     *********************************************/

    $("#left_menu ul li").hover(function () {
        //alert(333);
        //$(this).removeClass("menu");
        //$(".one ul li").find(".mask").hide();
        //$(".one ul li").find(".menu_1").hide();
        $(this).addClass("menu");
        $(this).find(".mask").show();
        $(this).find(".menu_1").show();

    }, function () {
        $(this).removeClass("menu").addClass("yuan");
        $(this).find(".mask").hide();
        $(this).find(".menu_1").hide();
    });

    /*
     * 图书 选项卡
     *********************************************/

    /*
     * .righttitle ul.tabtitle 头部容器
     *          li.tabtitlecur  当前选中的
     * .bookleftcon 是内容部分
     * #bookleftcon_n 是当前
     * 
     */

	$(".righttitle ul li").mouseover(function(){
		$(".righttitle ul li").removeClass("tabtitlecur")
		$(this).addClass("tabtitlecur");
		$(".bookleftcon").hide();
                //alert("#bookleftcon_"+$(this).attr('ext'));
		$("#bookleftcon_"+$(this).attr('ext')).show();
	});

    /*
     * 左侧畅销书 选项卡
     *********************************************/

    /*
     * .bookright ul.tabindex 头部容器
     *          li.tabcur  当前选中的
     * .rightcontent_1 是内容部分
     * #bookleftcon_n 是当前
     * 
     */

	$(".bookright ul.tabindex li").mouseover(function(){
		$(".bookright ul.tabindex li").removeClass("tabcur")
		$(this).addClass("tabcur");
		$(".rightcontent").hide();
                //alert("#bookleftcon_"+$(this).attr('ext'));
		$("#rightcontent_"+$(this).attr('ext')).show();
	});


    /*
     * 左侧畅销书 选项卡下面 内容部分 动态处理
     * 
     * 
     * 
     *********************************************/
        $(".rightcontent ul li").mouseover(function(){
            $(".rightcontent ul li").removeClass("cur");
            $(".rightcontent ul li a.mline").hide();
            $(".rightcontent ul li a.sline").show();
            //$(".rightcontent ul li a.mline").hide();
            $(this).find(".sline").hide();
            $(this).addClass("cur");
            $(this).find(".mline").show();
        });

});
