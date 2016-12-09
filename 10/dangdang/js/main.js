$(document).ready(function () {
    $(".phone_h").hover(function () {
        $(".phone_l").show();
        $(this).width($(this).width() - 3);
        $(this).addClass("top_menu_hover1");
    },
            function () {
                $(".phone_l").hide();
                $(this).width($(this).width() + 3);
                $(this).removeClass("top_menu_hover1");
            });

    $(".top_menu_w").hover(function () {

        $(".my_l_" + $(this).attr('ext')).show();
        $(this).addClass("top_menu_w_h");
    },
            function () {
                $(".my_l_" + $(this).attr('ext')).hide();

                $(this).removeClass("top_menu_w_h");
            });

    $(".top_menu_w div p").hover(function () {
        $(this).addClass("select_my_l");
    }, function () {
        $(this).removeClass("select_my_l");
    });


    $(".select").hover(function () {
        $('.select_all_category').show();
    },
            function () {
                $('.select_all_category').hide();
            });
    $(".select_all_category p").hover(function () {
        $(this).addClass('select_my_l');

    },
            function () {
                $(this).removeClass('select_my_l');
            });

    /*  滚动图右侧的  尾品汇 服务公告 动态切换
     */

    $('.ad4 .tab div').mouseover(function () {
        $('.ad4 .tab div').removeClass('tab_current'); // 所有头部选项卡 移除 选中状态
        $(this).addClass('tab_current');               // 当前事件头部选项卡  切换为选中状态
        $(".ad4_list ul").hide();                      // 下面的内容部分 全部隐藏
        $(".ad4_list_" + $(this).attr('ext')).show();  // 根据 ext 值显示对应的 内容部分
    });


    /* 定时器1 负责 ad4 选项卡的自动切换
     * 
    */
    var currentDom1 = '';

    setInterval(function () {

        if (currentDom1 == '')
        {
            currentDom1 = $('.ad4 .tab div').first();
        } else
        {
            currentDom1 = currentDom1.next();
            if (!currentDom1.is('.ad4 .tab div'))
            {
                currentDom1 = $('.ad4 .tab div').first();
            }
        }


        $('.ad4 .tab div').removeClass('tab_current');
        $(currentDom1).addClass('tab_current');
        $(".ad4_list ul").hide();
        $(".ad4_list_" + $(currentDom1).attr('ext')).show();
    }, 1000);

    /*  ad5 选项卡
     * 
     * 同理 ad4
     */
    $(".ad5 .tab div").mouseover(function () {
        $(".ad5 .tab div").removeClass("tab_current");
        $(this).addClass("tab_current");
        $('.ad5_img img').hide();
        $('.ad5_img_' + $(this).attr('ext')).show();
    });


    /* 定时器2 负责 ad5 选项卡的自动切换
    */

    var currentDom2 = '';
    setInterval(function () {
        if (currentDom2 == '')
        {
            currentDom2 = $(".ad5 .tab div").first();
        } else
        {
            currentDom2 = currentDom2.next();
            if (!currentDom2.is(".ad5 .tab div"))
            {
                currentDom2 = $(".ad5 .tab div").first();
            }
        }
        $(".ad5 .tab div").removeClass("tab_current");
        $(currentDom2).addClass("tab_current");
        $('.ad5_img img').hide();
        $('.ad5_img_' + $(currentDom2).attr('ext')).show();
    }, 2000);


    /* 左侧菜单 动态效果
     * .left_menu_li  就是菜单的一行
     * 
     * 当 li 鼠标移入时，弹出 #left_menu_ext_ 扩展菜单。
     *
     **/



    $(".left_menu_li").hover(
            function () {
                $("#left_menu_ext_" + $(this).attr("ext")).show();  // 因为 .left_menu_li 和 left_menu_ext_ 用 ext 属性关联，所以这里操作dom 比较方便直接

                $(".left_menu_li").removeClass("left_menu_li_current");

                $(this).addClass("left_menu_li_current");
            },
            function () {
                $("#left_menu_ext_" + $(this).attr("ext")).hide();
                $(this).removeClass("left_menu_li_current");
            }
    );

    /*  当鼠标移入 扩展菜单时 要保持 左边的 .left_menu_li 是选中状态。
     * 
     *  否则因为触发 .left_menu_li 的 移出事件，则左侧菜单，和右侧扩展菜单都会消失状态。
     * 
     */

    $(".left_menu_ext").hover(
            function () {
                var id = $(this).attr('id');  // 获得当前 扩展菜单的 id
                //id = id.replace("left_menu_ext_", "", id);
                id = id.replace("left_menu_ext_", "");  // 通过字符串替换 把 left_menu_ext_1 还原成 1

                $(".left_menu_li[ext=" + id + "]").addClass("left_menu_li_current");
                $(this).show();
            },
            function () {
                $(this).hide();
                $(".left_menu_li").removeClass("left_menu_li_current");
            }
    );

    
    /* 控制第一章图 文档载入完毕就显示出来。
     * 后面循环 根据图片的数量，生成若干小圆点。 添加到 #circle
    */
    $(".ppt img:eq(0)").show(); 
    
    var pptImgLength = $(".ppt img").length;
    $("#DD_hidden_2").val(pptImgLength - 1);
    for (var i = 0; i < pptImgLength; i++)
    {
        $("#circle").append("<li ext='" + i + "'>" + (i + 1) + "</li>");
    }

    $("#circle li").mouseover(function () {
        $(".ppt img").stop();
        $(".ppt img").css('opacity', 0).hide();

        $(".ppt2 span").stop();
        $(".ppt2 span").css('opacity', 0).hide();


        $("#circle li").css("backgroundColor", "#d4d4d4");

        $(this).css("backgroundColor", "#ff2832");
        //$(".ppt img:eq("+$(this).attr("ext")+")").fadeIn(1000);

        $(".ppt img:eq(" + $(this).attr("ext") + ")").animate({'opacity': 1}, 1000).show();

        $(".ppt2 span:eq(" + $(this).attr("ext") + ")").animate({'opacity': 1}, 1000).show();

        $("#DD_hidden_1").val($(this).attr("ext"));
    });

    /*
     * 鼠标移入 图片 处理
     * 
     * 显示 左右 按钮。
     */


    $(".ppt").hover(function () {
        $("#pptpre").show();
        $("#pptnext").show();
        $("#pptpre").css("left", "-30px");
        $("#pptpre").animate({left: '0px'});    /* 动态移入 */

        $("#pptnext").css("right", "-30px");
        $("#pptnext").animate({right: '0px'});

        clearInterval(pptNextTimer);
    },
            function () {
                $("#pptpre").animate({left: '-30px'});
                $("#pptnext").animate({right: '-30px'});
                pptNextTimer = setInterval(pptNextFunc, 1500);
            });

    /*
     * 点击 图片左切换 按钮 处理
     */

    $("#pptpre").click(function () {
        //alert($("#DD_hidden_1").val());
        var currentPptIndex = $("#DD_hidden_1").val();
        currentPptIndex--;
        if (currentPptIndex < 0)
        {
            currentPptIndex = $("#DD_hidden_2").val();
        }

        $(".ppt img").hide();
        $(".ppt img").stop();

        $(".ppt2 span").hide();
        $(".ppt2 span").stop();

        $(".ppt img:eq(" + currentPptIndex + ")").fadeIn(1000);
        $(".ppt2 span:eq(" + currentPptIndex + ")").fadeIn(1000);

        $("#DD_hidden_1").val(currentPptIndex);

        $("#circle li").css("backgroundColor", "#d4d4d4");

        $("#circle li:eq(" + currentPptIndex + ")").css("backgroundColor", "#ff2832");

    });

    /*
     *  定时器 调用了本方法。完成了大图片的切换，和下面的小图片的切换。（下一张切换）
     *  
     *  ("#pptnext") 按钮点击时 切换下一张图片 ppt2 切换下一组图片
     */

    $("#pptnext").click(function () {
        //alert($("#DD_hidden_1").val());
        var currentPptIndex = $("#DD_hidden_1").val();  // 当前 ppt 的索引
        currentPptIndex++; // 切换下一个图
        if (currentPptIndex > $("#DD_hidden_2").val())  // 猜测：#DD_hidden_2 为最大下标
        {
            currentPptIndex = 0;
        }

        $(".ppt img").css('opacity', 0).hide();  // 所有图片透明度0 完全透明，并且隐藏
        $(".ppt img").stop();                   // 所有图片对象增加了动画，.stop() 则结束了动画

        $(".ppt2 span").hide();                 // 下面的所有小图滚动 隐藏。
        $(".ppt2 span").stop();                 // 下面的所有小图滚动 动画停止。 因为在点击的时候应该立即响应，上一个动画必须停止。

        $(".ppt img:eq(" + currentPptIndex + ")").animate({'opacity': 1}, 1000).show(); // 根据上面就算的 ppt 索引显示下一张图，并且通过动画的效果逐渐显示出来
        //$(".ppt2 span:eq(" + currentPptIndex + ")").fadeIn(1000).show();                       // 小滚动图 也同样 切换。
        $(".ppt2 span:eq(" + currentPptIndex + ")").hide().fadeIn(1000);                       // 小滚动图 也同样 切换。
        //$(".ppt2 span:eq(" + currentPptIndex + ")").animate({'opacity': 1}, 1000).show(); 

        $("#DD_hidden_1").val(currentPptIndex); // 设定隐藏域的值为 当前 ppt图 的索引

        $("#circle li").css("backgroundColor", "#d4d4d4");  // 所有数字小圆点 变为灰色

        $("#circle li:eq(" + currentPptIndex + ")").css("backgroundColor", "#ff2832"); // 当前 ppt 图对应的数字小圆点 增加红色
        
        
        
        //$("#ease span").fadeOut(1000).hide();
       // $("#ease span:eq("+currentPptIndex+")").fadeIn(1000).show();

    });

    /*
     * 定时器 自动切换下一张图片。以及下面的小图
     * 
     * pptNextFunc 定时器 执行此函数，此函数调用了 click 点击事件处理
     * 
     */

    //clearInterval(pptNextTimer);
    
    var pptNextFunc = function () {
        $("#pptnext").click();
    };
    var pptNextTimer = setInterval(pptNextFunc, 1500);

/*  //下面的代码好像没用上。 是滚动图下面的 滚动产品


    $(".switchP li").hover(function () {
        $(".sg_body ul").hide();
        $(".sg_body_" + $(this).attr('ext')).show();

        $(".switchP li").css('backgroundPosition', '-67px -545px');

        $(this).css('backgroundPosition', '-82px -545px');

        currentDom3 = $(this);
        clearInterval(switchPTimer);
    }, function () {
        switchPTimer = setInterval(switchPFunc, 1500);
    });

    var currentDom3 = '';
    var switchPFunc = function () {
        if (currentDom3 == '')
        {
            currentDom3 = $(".switchP li").first();
        } else
        {
            currentDom3 = currentDom3.next();
            if (!currentDom3.is(".switchP li"))
            {
                currentDom3 = $(".switchP li").first();
            }
        }
        $(".sg_body ul").hide();
        $(".sg_body_" + $(currentDom3).attr('ext')).show();

        $(".switchP li").css('backgroundPosition', '-67px -545px');

        $(currentDom3).css('backgroundPosition', '-82px -545px');
    };
*/
    /* 定时器3 负责 滚动图的切换 每隔 1秒 切换一次
     * 
     * 这个定时器的功能？
     * 
    */    
/*
    var switchPTimer = setInterval(switchPFunc, 1500);

    $(".tushu_left_head_tab div").mouseover(function () {
        $(".tushu_left_head_tab div").removeClass("tushu_left_head_tab_curr")
        $(this).addClass("tushu_left_head_tab_curr");
        $(".tushu_left_body").hide();
        $(".tushu_left_body_" + $(this).attr('ext')).show();
    });

*/
    var currentTushu_right_body_dl_ext = 1;
    $(".tushu_right_head_tab").mouseover(function () {
        $(".tushu_right_head_tab").addClass("bggray");
        $(this).removeClass("bggray");

        $(".tushu_right_body_dl").hide();
        $(".tushu_right_body_dl_" + $(this).attr("ext")).show();
        currentTushu_right_body_dl_ext = $(this).attr("ext");
    });

    $(".tushu_right_body_dl dt").mouseover(function () {
        $(".tushu_right_body_dl_" + currentTushu_right_body_dl_ext + " dt").show();
        $(".tushu_right_body_dl_" + currentTushu_right_body_dl_ext + " dd").hide();
        $(this).hide();
        $(this).next().show();
    });

    $(".float_left_s").hover(function () {
        $('.float_left_s_' + $(this).attr('ext') + '_div').show();
    },
            function () {
                $('.float_left_s_' + $(this).attr('ext') + '_div').hide();
            });

    $(".float_left_s").click(function () {

        var top = $("#floor_l_head" + $(this).attr('ext')).position().top;
        $('html,body').animate({scrollTop: top}, 100);
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 200)
        {

            $(".float_left").addClass("transform1");
            $(".float_left").removeClass("transform2");
        } else
        {
            //$(".float_left").hide();
            $(".float_left").removeClass("transform1");
            $(".float_left").addClass("transform2");
        }
    });


    $(".fr_qrcode").hover(function () {
        $(".fr_qrcode_i").show();
    },
            function () {
                $(".fr_qrcode_i").hide();
            });

    $(".fr_car,.fr_car_t,.fr_car_n").hover(function () {
        $(".fr_car_t").css("backgroundColor", "#ff3228");
        $(".fr_car_n").css("backgroundColor", "#ff3228");
        $(".fr_car").css("backgroundPosition", "-42px -42px");
    },
            function () {
                $(".fr_car_t").css("backgroundColor", "");
                $(".fr_car_n").css("backgroundColor", "");
                $(".fr_car").css("backgroundPosition", "0px -42px");
            });

    /*
     $(".fr_car_t").hover(function(){
     $(this).css("backgroundColor","#ff3228");
     },
     function(){
     $(this).css("backgroundColor","");
     });
     */
    $(".fr_fav").hover(function () {
        $(".fr_fav_d").show().animate({right: "84px"});
        $(this).css("backgroundPosition", "-42px -84px");
    },
            function () {
                $(".fr_fav_d").stop().hide().css("right", "0px");
                $(this).css("backgroundPosition", "0px -84px");
            });


    $(".fr_fav2").hover(function () {
        $(".fr_fav2_d").show().animate({right: "84px"});
        $(this).css("backgroundPosition", "-42px -126px");
    },
            function () {
                $(".fr_fav2_d").stop().hide().css("right", "0px");
                $(this).css("backgroundPosition", "0px -126px");
            });


    $(".fr_top").hover(function () {
        $(this).css("backgroundColor", "#ff3228");
        $(this).css("backgroundPosition", "-42px -168px");
    },
            function () {
                $(this).css("backgroundColor", "");
                $(this).css("backgroundPosition", "0px -168px");
            });
    $(".fr_top").click(function () {
        //$("html,body").scrollTop(0);
        $("html,body").animate({"scrollTop": "0px"});
    });

    $(".fr_yj").hover(function () {
        $(this).css("backgroundColor", "#ff3228");
    },
            function () {
                $(this).css("backgroundColor", "");
            });
});
