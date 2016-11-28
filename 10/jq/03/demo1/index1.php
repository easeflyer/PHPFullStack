<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(function () {
            /*
             $("#panel h1").mouseover(function(){
             $("div.content").hide();
             }).mouseout(function(){
             $("div.content").show();
             })
             
             $("#panel h1").bind("mouseover",function(){
             $("div.content").hide();
             }).bind("mouseout",function(){
             $("div.content").show();
             })
             */
            // 2.1 版本使用正常。
            $("#panel h1").hover(function () {
                $("div.content").hide();
            }, function () {
                $("div.content").show();
            })


            /* 因为我们使用的是 2.1 版本的 jquery 因此 toggle 使用方法有变化  */

            /*
             $("#panel h1").toggle(function () {
             $(".content").show();
             }, function () {
             $(".content").hide();
             })
             // 1.9 版本之后 已经不能这样使用了。
             $("td").toggle(
             function () {
             $(this).addClass("selected");
             },
             function () {
             $(this).removeClass("selected");
             }
             );
             */

            $("table").click(function () {
                $("td").toggle();
            });

            //$("#panel h1").toggle();
            //$("#panel h1").toggle();
        })
    </script>
    <body>
        <div id="panel">
            <h1>你喜欢 什么运动</h1>
            <div class="content">足球和篮球</div>
        </div>

        <table border="1">
            <tr><td>111</td><td>222</td><td>333</td></tr>
            <tr><td>aaa</td><td>bbb</td><td>ccc</td></tr>
        </table>


    </body>
</html>
