<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <style type="text/css">
        #dv1{
            overflow:scroll; /* 显示滚动条*/
        }
    </style>
    <script type="text/javascript">
        window.onload = function () {
            var dv1 = document.getElementById("dv1");
            alert("dv1.style.width:"+dv1.style.width);   // 200px
            alert("dv1.style.height:"+dv1.style.height); // 200px
            alert("dv1.clientWidth:"+dv1.clientWidth);  // 183px 滚动条 占据了一部分空间。
            alert("dv1.offsetWidth:"+dv1.offsetWidth);  // 算上滚动条+边框 202px
        }
    </script>
    <body>
        <div id="dv1" style="width:200px; height:200px; border:1px solid #ff0000">
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />
            aaaaaaaaaaa<br />

        </div>
    </body>
</html>
