$(document).ready(function () {
/*
 * .float_left_s  每一个小图标
 *  里面的div 是色块
 *  
 *  $(".float_left_s").hover 这是处理了 红色色块的显示和隐藏。 但是图标本身的变色，没有再这里处理。
 */

    $(".float_left_s").hover(function () {
        $('.float_left_s_' + $(this).attr('ext') + '_div').show();
    }, function () {
        $('.float_left_s_' + $(this).attr('ext') + '_div').hide();
    });


    $(".float_left_s").click(function () {

        var top = $("#floor_l_head" + $(this).attr('ext')).position().top;
        $('html,body').animate({scrollTop: top}, 100);
    });



    /**
     * .scroll 方法 当用户滚动指定的元素时，会发生 scroll 事件，查手册可知。
     * .scrollTop() 匹配元素的滚动条，距离顶端的偏移量。
     *      $(window).scrollTop() 也就是 当前浏览器窗口 滚动条距离顶部的偏移量。
     */
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



});
