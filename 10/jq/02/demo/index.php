<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            //alert($("#v2").text());
            var $li = $("ul li:eq(2)");
            alert($li.text());
            //创建节点:
            var $createLi_1 = $("<li style='color:#ff0000'>橘子</li>");
            $("ul").append($createLi_1);

            var $createLi_2 = $("<li style='color:#ff0000'>雪梨</li>");
            $("ul").append($createLi_2);

            var $createLi_3 = $("<li style='color:#ff0000'>芒果</li>");
            $createLi_3.appendTo($("ul")); // 加到父元素上

            var $createLi_4 = $("<li style='color:#ff0000'>桃子</li>");
            $("ul").prepend($createLi_4);  // prepend 把子元素 前置到父元素中。
            
            //$li.prependTo("ul");          //  prependTo 就是父子位置换过来，结果一样
            $("p").after($("<h3>请问？</h3>"));  // 在 p 后面插入
            $("p").before($("<h3>Hello!</h3>"));  // 在 p 前面插入
        })
    </script>
    <body>
        <p>你喜欢吃什么水果</p>
        <ul>
            <li>苹果</li>
            <li id="v2">菠萝</li>
            <li>西瓜</li>
            <li>胡萝卜</li>
        </ul>
        <hr />
        <ul></ul>
        <p>这里是第二个p标签</p>
    </body>
</html>
