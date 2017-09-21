<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <style>
            #dv{border:1px solid #FF0000;width:300px}

        </style>
    </head>
    <script>
// JavaScript Document
        window.onload = function () {
            var dv = document.getElementById("dv");
            alert(dv.style.color); //得到的是颜色的 rgb 三基色 值比如：rgb(255,0,0)。
            dv.style.fontSize = "32px"; // 在 js 中 style 属性不用 - 号连接;而是第二个单词首字母大写
            //dv.style.fontWeight = "900" // 谷歌浏览器无效，safari 有效
            alert(dv.style.width); // 行内属性 只有写在 标签上才能起作用
        }
    </script>
    <body>
        <div id="dv" style="color:#FF0000;font-weight:bold;width:510px;font-size">aaaaaaaaa</div>
    </body>
</html>
