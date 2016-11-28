<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <style type="text/css">
        .one{
            width:200px;
            height:200px;
            border:1px  solid #ff0000;
            
            position:absolute;  /* 注意这里定义了绝对定位，因此子元素都是相对于 父元素定位*/
            /*padding:25px;*/
            /*margin:20px;*/
        }
        .two{
            width:100px;
            height:100px;
            border:1px solid #00ff00;
            margin-top:10px;
            position:relative;
            top:10px;   /* 相对于父元素顶部偏移 15像素;必须有 position 才有效 */ 

        }
    </style>
    <script type="text/javascript">
        window.onload = function () {
            var div1 = document.getElementsByTagName("div")[0];
            var div2 = document.getElementsByTagName("div")[1];
            //div2.style = "top:25px"; // 设置
            alert(div2.style.top);  /* 相对于父元素顶部偏移 15像素 */
        }
    </script>
    <body>
        <div class="one">
            <div class="two" style="top:100px"></div>
        </div>
    </body>
</html>
