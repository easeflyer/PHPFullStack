<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        /**
         * 点击 li 后 复制对应的 li 到另外一个 ul
         */
        
        $(document).ready(function () {
            //选中u_1 中li  克隆后 添加到u_2中
            $("#u_1 li").click(function () {  //#ul li 所有的u_1 li 随便单击一个
                //$(this)当前的元素对象: 在事件处理函数中 this 就是引发事件的对象。
                $("#u_2").append(   $(this).clone()   );
                //$("#u_2").append($(this));  //这样写 就是 剪切了不是复制
            })
        })
    </script>
    <body>
        <div id="dv">
            <ul id="u_1">
                <li>111111111</li>
                <li>2222222</li>
                <li>333333333</li>
            </ul>
        </div>
        <div>
            <ul id="u_2">
            </ul>
        </div>
    </body>
</html>
