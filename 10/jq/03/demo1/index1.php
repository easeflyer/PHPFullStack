<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(function () {
            var i = 0;
            var $tg = $("#tg");

            /*
             
             $("#panel h1").mouseover(function () {
             $("div.content").hide();
             }).mouseout(function () {
             $("div.content").show();
             })
             
             $("#panel h1").bind("mouseover", function () {
             $("div.content").hide();
             }).bind("mouseout", function () {
             $("div.content").show();
             })
             */

            /*
             
             $("#panel h1").hover(function () {
             $("div.content").hide();
             }, function () {
             $("div.content").show();
             })
             */


            /*
             *   toggle 点击切换效果
             * 
             */


            $tg.click(function () {
                i++;
                // toggle 参数1：速度毫秒，参数2：效果, 参数3 回调函数
                $("#panel h1").toggle(200, "linear", function () {
                    $("#panel").append(i);
                });
            });
            // toggle end



            // 已下代码已经过时。

            //		$("#panel h1").toggle(function(){
            //			$(".content").show();
            //		},function(){
            //			$(".content").hide();
            //		})
        })
    </script>
    <body>
        <div id="panel">
            <h1>你喜欢 什么运动</h1>
            <div class="content">足球和篮球</div>

            <input type="button" value="切换" id="tg" />
        </div>
    </body>
</html>
