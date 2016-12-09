<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(function () {
            $("#test").click(function () {
                $.ajax({
                    type: "get",
                    url: "test.php?random=" + Math.random() + "&id=100",
                    dataType: "html",
                    success: function (data) {
                        $("#testVal").html(data);
                    }
                })
            })
        })
    </script>
    <body>
        <input type="button" id="test" value="ajax">
            <div id="testVal">异步请求的内容</div>
    </body>
</html>
