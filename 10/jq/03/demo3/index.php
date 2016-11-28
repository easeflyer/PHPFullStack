<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(function () {
            var $dv = $("#dv");
            $("#bt").click(function () {
                //dv是 显示的  点击按钮 ，影藏，反之则显示
                 // 对象.is("状态")
                if ($dv.is(":visible")) {
                    //$dv.hide(2000);
                    //$dv.fadeOut(2000);
                    //$dv.slideDown(2000);  // jquery2.x 版本 失效
                } else {
                    //$dv.show(2000);
                    //$dv.fadeIn(2000);
                    //$dv.slideUp(2000);    // jquery2.x 版本 失效
                }

            })
            $("#bt1").click(function(){
                $dv.css("width","400px");
            });
        })
    </script>
    <body>
        <div id="dv" style="border:1px solid #ff0000; font-size:36px;position:absolute"> aaaa </div>
        <div style="clear:both;height:200px"> 333 </div>
        <input type="button" id="bt" value="隐藏" />
        <input type="button" id="bt1" value="变化宽度" />
    </body>
</html>
