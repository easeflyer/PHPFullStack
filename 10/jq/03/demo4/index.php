<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style type="text/css">
        #panel{
            border:1px solid #ff0000;
            width:100px;
            height:100px;
            position:relative;
            background:#33FF00;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $("#panel").click(function () {
                
                //$(this).animate({left:"400px",height:"200px"},3000)   // 从当前位置移动到距离左边 400px； 从当前高度变化为高度 200px 使用 3秒的时间
                //        .animate({top:"400px",height:"50px"},3000).css("background","#cecece");// 然后继续变化到：距离顶部 400px 用 3秒的时间  注意颜色立刻发生了变化。
                

                $(this).animate({left: "600px"}, 3000, function () {
                    alert("动画执行完毕")
                });
                
                
            })

        })
    </script>
    <body>
        <div id="panel"></div>
        
        <input type="button" onclick="alert('是否移动中？'+$('#panel').is(':animated'))" value="还在动吗？" />
    </body>
</html>
