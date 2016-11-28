<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#bt").click(function () {
                    //alert($("#dv1").css("width"));
                    //$("#dv1").css("color","#00ff00");
                    $("#dv1").css({"color": "#000000", "width": "300px"});
                    //$("#dv1").attr("class","c1"); // 设置 class 属性
                });
            });
        </script>
        <style>
            .c1{font-size: 36px}
        </style>
    </head>


    <body>

        <input type="button" id="bt" value="点点看" />
        <div id="dv1" style="color:#FF0000;width:600px;border:1px solid #ff0000;">ccc</div>
    </body>
</html>
