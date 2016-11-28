<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style type="text/css">
        ul{
            list-style:none;
            margin:auto;
        }
        ul li{
            border:1xp solid #ff0000;
            float:left;
            margin-left:15px;
        }
        #rem{
            position:absolute;  /* 有了定位属性 下面的 top,left 才有用 */
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            // 注意 事件处理函数的参数 e 就是 event 对象 参考：js 事件章节
            $("img").mouseover(function (e) { // mouseover 事件不一定连续触发
                var newImg = "<img src=" + this.src + " width='200' height='150' id='rem'>";
                $("body").append(newImg); // 把 新图片追加到 body 里。但是位置还不对。
                //$("#rem").css("position","absolute"); // 这是设置 绝对定位也可以
                $("#rem").css({           // 获得 #rem 也就是新追加的元素 设置他的位置。
                    "top": e.pageY + "px",  
                    "left": e.pageX + "px"   // e.pageX 属性是鼠标指针的位置，相对于文档的左边缘
                })
            }).mouseout(function () {  // 好理解：鼠标移开 新图片删除。
                $("#rem").remove();
            })
        })
    </script>
    <body>
        <ul>	
            <li><img src="imgs/1.jpg" width="60" height="40"></li>
            <li><img src="imgs/2.jpg" width="60" height="40"></li>
            <li><img src="imgs/3.jpg" width="60" height="40"></li>
            <li><img src="imgs/4.jpg" width="60" height="40"></li>
        </ul>
    </body>
</html>
