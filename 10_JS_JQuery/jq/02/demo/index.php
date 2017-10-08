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
            var $li = $("ul li:eq(2)"); // 从0开始 西瓜
            alert($li.text());
            //创建节点: 注意 ul 被选中了几个
            var $createLi_1 = $("<li style='color:#ff0000'>橘子</li>"); // jq 的灵活语法
            $("ul").append($createLi_1); // 添加到末尾
            var $createLi_2 = $("<li style='color:#ff0000'>雪梨</li>");
            $("ul").append($createLi_2);// 添加到末尾
            var $createLi_3 = $("<li style='color:#ff0000'>芒果</li>");
            $createLi_3.appendTo($("ul"));// 添加到末尾
            var $createLi_4 = $("<li style='color:#ff0000'>桃子</li>");
            $("ul").prepend($createLi_4);// 添加到开头
            $("ul").after($("<p>添加到最后</p>")); // 添加到 ul 的后面
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
        <!-- 注意这个 ul 也被添加了 -->
        <ul>
            <li>1111</li>
        </ul>
    </body>
</html>
