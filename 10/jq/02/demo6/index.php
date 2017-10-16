<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#bt").click(function () {
                var $dv1 = $("#dv1").children(); // 子元素，不包含孙子
                for (var i = 0; i < $dv1.length; i++) {
                    //  jq-->js对象   var obj = $obj[下标]
                    //alert($dv1[i].innerHTML);
                    alert($dv1[i].tagName);
                }

            });
            $("#bt1").click(function () {
                var $dv1 = $("#dv1").siblings();
                for (var i = 0; i < $dv1.length; i++) {
                    //  jq-->js对象   var obj = $obj[下标]

                    alert(  $dv1[i].nodeName + ":" + $dv1[i].innerHTML);
                }
            })
        })
    </script>
    <body>
        <input type="button" id="bt" value="点点看" />
        <input type="button" id="bt1" value="siblings" />
        <div id="dv1">
            <div id="dv2">ssssss</div>
            <p>aaaa</p>
            <ul>
                <li>1111</li>
                <li>2222</li>
                <li>33333</li>
            </ul>
        </div>
        <div id="dv3">ttt</div>
    </body>
</html>
